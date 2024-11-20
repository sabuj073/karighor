@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="page_sec_pad_50 page_res_mar pt_25_res">
        <div class="container">
            <div class="row">
                <div class="bg-white box_shadow p-4 rad_5">
                    <h3 class="text-center">Know Us Here</h3>
                    <div class="mt-3">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est, dolor provident? Minus iusto maiores,
                        amet voluptas deserunt exercitationem! Facilis harum soluta, quod maxime distinctio quisquam et hic
                        autem repellat. Asperiores sapiente, mollitia culpa laborum illum temporibus voluptates et, modi,
                        reprehenderit eaque sunt ullam est exercitationem nemo quo velit aspernatur magnam?
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
