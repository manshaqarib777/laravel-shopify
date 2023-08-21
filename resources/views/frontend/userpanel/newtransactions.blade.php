@extends('frontend.layouts.auth')

@section('content')
    <section class="blog__area pt-70 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12 col-lg-12">
                    <div class="profile__tab-content">
                        <div class="tab-content" id="profile-tabContent">
                            <article class="postbox__item format-image mb-40 transition-3">
                                <div class="blog__grid-tag">
                                    <a href="javascript:void(0);">{{ __('frontend/user.transactions') }}</a>
                                </div>
                            </article>
                            <div class="tab-pane fade active show" id="nav-ticket" role="tabpanel"
                                 aria-labelledby="nav-ticket-tab">
                                <div class="profile__ticket table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">{{ __('frontend/user.transactions_page.id') }}</th>
                                            <th scope="col">{{ __('frontend/v5.payment_method') }}</th>
                                            <th scope="col">{{ __('frontend/user.transactions_page.wallet') }}</th>
                                            <th scope="col">{{ __('frontend/user.transactions_page.txid') }}</th>
                                            <th scope="col">{{ __('frontend/user.transactions_page.status') }}</th>
                                            <th scope="col">{{ __('frontend/user.transactions_page.amount') }}</th>
                                            <th scope="col">{{ __('frontend/user.transactions_page.date') }}</th>
                                            <th scope="col">{{ __('frontend/user.transactions_page.actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($user_transactions) > 0)
                                            @foreach($user_transactions as $transaction)
                                                <tr class="@if($transaction->isPending()) bg-light @elseif($transaction->isWaiting()) bg-light-2 @endif">
                                                    <th scope="row">#{{ $transaction->id }}</th>
                                                    <td>{{ strtoupper($transaction->payment_method) }}</td>
                                                    <td>{{ strlen($transaction->wallet) ? decrypt($transaction->wallet) : '' }}</td>
                                                    <td style="max-width:200px;">
                                                        @if(strlen($transaction->txids) > 0)
                                                            @foreach(explode(',', decrypt($transaction->txids)) as $txid)
                                                                <div>
                                                                    <a href="https://blockchain.info/tx/{{ $txid }}"
                                                                       target="_blockchain_{{ $loop->iteration }}">
                                                                        {{ $txid }}
                                                                        <ion-icon name="open"></ion-icon>
                                                                    </a>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($transaction->isPaid())
                                                            <span class="label label-success">
                                                {{ __('frontend/user.transactions_page.confirmed') }}
                                            </span>
                                                        @elseif($transaction->isPending())
                                                            <span class="label label-warning">
                                                {{ __('frontend/user.transactions_page.confirmations', [
                                                    'confirms' => $transaction->confirmations,
                                                    'confirms_needed' => App\Models\Setting::get('shop.btc_confirms_needed')
                                                ]) }}
                                            </span>
                                                        @else
                                                            <span class="label label-secondary">
                                                {{ __('frontend/user.transactions_page.waiting') }}
                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $transaction->getFormattedAmount() }}
                                                    </td>
                                                    <td>
                                                        {{ $transaction->getDate() }}
                                                    </td>
                                                    <td>
                                                        @if(!$transaction->isWaiting() && strlen($transaction->txid) > 0)
                                                            <a href="https://blockchain.info/tx/{{ decrypt($transaction->txid) }}"
                                                               target="_blockchain_{{ $transaction->id }}">
                                                                Blockchain
                                                                <ion-icon name="open"></ion-icon>
                                                            </a>
                                                        @elseif($transaction->isWaiting())
                                                            <form method="POST"
                                                                  action="{{ route('deposit-btc-post', $transaction->id) }}">
                                                                @csrf

                                                                <button type="submit" class="btn btn-link"
                                                                        style="margin: 0;padding: 0;">{{ __('frontend/user.i_paid_button') }}</button>
                                                            </form>
                                                        @elseif($transaction->isPending())
                                                            <form method="POST"
                                                                  action="{{ route('deposit-btc-post', $transaction->id) }}">
                                                                @csrf

                                                                <button type="submit" class="btn btn-link"
                                                                        style="margin: 0;padding: 0;">{{ __('frontend/user.check_again') }}</button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="8">{{ __('frontend/user.transactions_page.no_transactions_exists') }}</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                {!! preg_replace('/' . $user_transactions->currentPage() . '\?page=/', '', $user_transactions->links()) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
