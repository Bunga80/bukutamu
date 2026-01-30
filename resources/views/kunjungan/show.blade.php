<x-main-layout :title-page="__('Detil Kunjungan')">
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-lg-8 col-md-10">
                <div class="card">
                    <div class="card-body">
                        @include('kunjungan.partials.info-data-kunjungan')
                        
                        <div class="mt-4">
                            <a href="{{ route('kunjungan.edit', $kunjungan->id) }}" class="btn btn-warning">
                                Edit
                            </a>
                            <x-tombol-kembali :href="route('kunjungan.index')" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>