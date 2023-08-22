<?php

namespace App\Http\Controllers\Backend\Management;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserOrder;
use App\Models\UserPermission;
use App\Models\UserTicket;
use App\Models\UserTransaction;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
use App\Models\Setting;
use DB;
class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('backend');
        $this->middleware('permission:manage_users');
    }

    public function loginAsUser($id)
    {
        if (User::where('id', $id)->exists()) {
            Auth::loginUsingId($id, true);

            return redirect()->route('home');
        }

        return redirect()->route('backend-management-users');
    }

    public function deleteUser($id)
    {
        User::where('id', $id)->delete();

        return redirect()->route('backend-management-users');
    }

    public function updateUserPermissionsForm(Request $request)
    {
        if (!Auth::user()->hasPermission('manage_users_permissions')) {
            return redirect()->route('no-permissions');
        }

        if ($request->getMethod() == 'POST') {
            if ($request->get('user_edit_id')) {
                $user = User::where('id', $request->input('user_edit_id'))->get()->first();

                if ($user != null) {
                    $validator = Validator::make($request->all(), [
                        'user_edit_permissions' => 'array',
                    ]);

                    if (!$validator->fails()) {
                        $perms = $request->input('user_edit_permissions');

                        UserPermission::where('user_id', $user->id)->delete();
                        if ($perms != null) {
                            foreach ($perms as $permId) {
                                UserPermission::create([
                                    'user_id' => $user->id,
                                    'permission_id' => $permId,
                                ]);
                            }
                        }

                        return redirect()->route('backend-management-user-edit', $user->id)->with([
                            'successMessage' => __('backend/main.changes_successfully'),
                        ]);
                    }

                    $request->flash();

                    return redirect()->route('backend-management-user-edit', $user->id)->withErrors($validator)->withInput();
                }
            }
        }

        return redirect()->route('backend-management-users');
    }

    public function editUserForm(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            if ($request->get('user_edit_id')) {
                $user = User::where('id', $request->input('user_edit_id'))->get()->first();

                if ($user != null) {
                    //dd($request->all());
                    $validator = Validator::make($request->all(), [
                        'user_edit_name' => 'required|max:30',
                        'user_edit_balance' => 'required',
                        // 'user_edit_jabber' => 'unique:users,jabber_id,' . $user->id,
                    ]);

                    if (!$validator->fails()) {
                        $name = $request->input('user_edit_name');
                        $jabber = $request->input('user_edit_jabber');
                        //$balance = $request->input('user_edit_balance');
                        $currnet = DB::select("SELECT * FROM lv_settings WHERE `id`= 18;");
                        $currnet_get =  $currnet[0]->value;

                        if ($currnet_get == 'dollar') {
                            $balance = str_replace(",", "", $request->input('user_edit_balance'));
                        } else {
                            $balances = str_replace(".", "", $request->input('user_edit_balance'));
                            $balance = str_replace(",", ".", $balances);
                        }
                        //dd($balance);

                        $user->update([
                            'name' => $name,
                            'jabber_id' => $jabber,
                            'balance_in_cent' => $balance,
                        ]);

                        return redirect()->route('backend-management-user-edit', $user->id)->with([
                            'successMessage' => __('backend/main.changes_successfully'),
                        ]);
                    }

                    $request->flash();

                    return redirect()->route('backend-management-user-edit', $user->id)->withErrors($validator)->withInput();
                }
            }
        }

        return redirect()->route('backend-management-users');
    }

    public function showTickets($id, $pageNumber = 0)
    {
        $user = User::where('id', $id)->get()->first();

        if ($user == null) {
            return redirect()->route('backend-management-users');
        }

        $tickets = UserTicket::where('user_id', $id)->orderByDesc('created_at')->paginate(10, ['*'], 'page', $pageNumber);

        if ($pageNumber > $tickets->lastPage() || $pageNumber <= 0) {
            return redirect()->route('backend-management-user-tickets-with-pageNumber', [$id, 1]);
        }

        return view('backendV2.management.users.tickets', [
            'user' => $user,
            'tickets' => $tickets,
            'managementPage' => true,
        ]);
    }

    public function showOrders($id, $pageNumber = 0)
    {
        $user = User::where('id', $id)->get()->first();

        if ($user == null) {
            return redirect()->route('backend-management-users');
        }

        $orders = UserOrder::where('user_id', $id)->orderByDesc('created_at')->paginate(10, ['*'], 'page', $pageNumber);

        if ($pageNumber > $orders->lastPage() || $pageNumber <= 0) {
            return redirect()->route('backend-management-user-orders-with-pageNumber', [$id, 1]);
        }

        return view('backendV2.management.users.orders', [
            'user' => $user,
            'orders' => $orders,
            'managementPage' => true,
        ]);
    }

    public function showUserEditPage($id)
    {
        $user = User::where('id', $id)->get()->first();

        if ($user == null) {
            return redirect()->route('backend-management-users');
        }

        $tickets = UserTicket::where([
            ['user_id', '=', $id],
            ['status', '!=', 'closed'],
        ])->orderByDesc('updated_at')->get();

        $statistics = [];

        $statistics["orders"] = $this->eventsByMonth($id, UserOrder::class);
        $statistics["tickets"] = $this->eventsByMonth($id, UserTicket::class);
        $statistics["transactions"] = $this->eventsByMonth($id, UserTransaction::class);
        //$statistics["permissions"] = $this->eventsByMonth($id, \App\Models\UserPermission::class);

        $chart = [];

        $chart["orders"] = $this->formatChartData($statistics["orders"]);
        $chart["tickets"] = $this->formatChartData($statistics["tickets"]);
        $chart["transactions"] = $this->formatChartData($statistics["transactions"]);
        //$chart["permissions"] = $this->formatChartData($statistics["permissions"]);

        //dd($chart);
        $setting = Setting::where('id', 18)->get()->first();
        $currentprice = $setting->value;


        return view('backendV2.management.users.edit', [
            'user' => $user,
            'tickets' => $tickets,
            'chart' => $chart,
            'managementPage' => true,
            'currentprice' => $currentprice,
        ]);
    }

    private function eventsByMonth($user_id, $model)
    {
        $events = $model::where('user_id', $user_id)->orderBy('created_at')
            ->get()
            ->groupBy(function ($events) {
                return Carbon::parse($events->created_at)->format('m-Y');
            });

        return $events;
    }

    private function formatChartData($statistics)
    {
        $itemY[] = "0";
        $itemX[] = 0;
        $count = 0;

        foreach ($statistics as $key => $order) {
            $itemY[] = $key;
            $itemX[] = $order->count();
            $count += $order->count();
        }
        $chart["y"] = implode(',', $itemY);
        $chart["x"] = implode(',', $itemX);
        $chart["count"] = $count;

        return $chart;
    }

    public function showUsersPage(Request $request, $pageNumber = 0)
    {
        $users = User::orderByDesc('created_at')->paginate(10, ['*'], 'page', $pageNumber);

        if ($pageNumber > $users->lastPage() || $pageNumber <= 0) {
            return redirect()->route('backend-management-users-with-pageNumber', 1);
        }

        return view('backendV2.management.users.list', [
            'users' => $users,
            'managementPage' => true,
        ]);
    }

}
