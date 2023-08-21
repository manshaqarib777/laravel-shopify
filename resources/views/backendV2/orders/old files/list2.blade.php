@extends('backendV2.layouts.default')
@section('pageTitle', 'Mehrfach Bestellungen')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <!--begin::Card-->
            <div class="card">
                <div class="card-body py-4">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users"
                           style="overflow-x: auto; overflow-y: hidden;">
                        <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th>ID</th>
                            <th>Benutzer</th>
                            <th>Bestellungen</th>
                            <th>Abgearbeitet</th>
                            <th>Aktionen</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                        @foreach($shoppings as $shopping)
                            <tr>
                                <th scope="row">{{ $shopping->id }}</th>
                                <td>{{ $shopping->getUser()->name }}</td>
                                <td>{{ count($shopping->getOrders()) }}</td>
                                <td>{{ $shopping->isDone() ? 'Ja' : 'Nein' }}</td>
                                <td>
                                    @if(!$shopping->isDone())
                                        <a href="{{ route('backend-shopping-done', $shopping->id) }}"
                                           data-toggle="tooltip" data-original-title="Als abgearbeitet markieren">Als
                                            abgearbeitet markieren</a>
                                        |
                                    @endif
                                    <a href="{{ route('backend-shopping-id', $shopping->id) }}" class="menu-link px-3">Ansehen</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')

@endsection
