<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\UserTicket;
use Illuminate\Http\Request;
use QueryException;

class NotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('backend');
    }

    public function deleteAllNotifications()
    {
        Notification::truncate();

        return redirect()->route('backend-notifications');
    }

    public function deleteNotification($id)
    {
        Notification::where('id', $id)->delete();

        return redirect()->route('backend-notifications');
    }

    public function showNotificationsPage(Request $request, $pageNumber = 0)
    {
        $notifications = Notification::orderByDesc('created_at')->paginate(10, ['*'], 'page', $pageNumber);

        if ($pageNumber > $notifications->lastPage() || $pageNumber <= 0) {
            return redirect()->route('backend-notifications-with-pageNumber', 1);
        }

        return redirect()->route('backend-dashboard');
        return view('backendV2.notifications.list', [
            'notifications' => $notifications,
        ]);
    }

    public function readmessage(Request $request)
    {
        try {
            $update_data = ["read_status" => '1'];
            $update_status = UserTicket::where("read_status", "0")->update($update_data);

            if ($update_status) {
                $status = true;
                $msg = "Readed Successful";
            } else {
                $status = false;
                $msg = "Readed unsuccessful";
            }
        } catch (QueryException $e) {
            $status = false;
            $msg = $e->getMessage();
        }

        return response()->json(["status" => $status, "msg" => $msg, "data" => "N/A"]);
    }

    public function readNotification(Request $request)
    {

        try {
            $update_notification = ["readed" => 'true'];
            $update_status = Notification::where("readed", "false")->update($update_notification);

            if ($update_status) {
                $status = true;
                $msg = "Readed Successful";
            } else {
                $status = false;
                $msg = "Readed unsuccessful";
            }
        } catch (QueryException $e) {
            $status = false;
            $msg = $e->getMessage();
        }

        return response()->json(["status" => $status, "msg" => $msg, "data" => "N/A"]);
    }

    public function clearMessage(Request $request)
    {


        try {

            $deleteQuery = UserTicket::whereNotNull('id')->delete();

            if ($deleteQuery) {
                $status = true;
                $msg = "Message has been Cleared Successful";
                $condition = "success";
            } else {
                $status = false;
                $msg = "Message Clear unsuccessful";
                $condition = "error";
            }
        } catch (Exception $e) {
            $status = false;
            $msg = "something wen,t wrong";
            $condition = "error";
        }

        return response()->json(["status" => $status, "message" => $msg, "data" => "N/A", "condition" => $condition]);
    }

    public function clearNotification(Request $request)
    {


        try {

            $deleteQuery = Notification::whereNotNull('id')->delete();
            // $deleteQuery = Notification::where('id',4)->delete();

            if ($deleteQuery) {
                $status = true;
                $msg = "Message has been Cleared Successful";
                $condition = "success";
            } else {
                $status = false;
                $msg = "Message Clear unsuccessful";
                $condition = "error";
            }
        } catch (Exception $e) {
            $status = false;
            $msg = "something wen,t wrong";
            $condition = "error";
        }

        return response()->json(["status" => $status, "message" => $msg, "data" => "N/A", "condition" => $condition]);
    }
}
