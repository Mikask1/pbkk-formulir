<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <section class="flex items-center justify-center bg-cyan-200 min-h-screen">
        <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-cyan-100 border-0">
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between items-center">
                        <h6 class="text-cyan-700 text-xl font-bold">
                            Kasir
                        </h6>
                        <button class="bg-cyan-400 hover:bg-cyan-500 text-white font-bold py-2 px-4 rounded"
                            onclick="window.location.href='/'">
                            List
                        </button>
                    </div>
                    @if (session('success'))
                        <div class="bg-green-200 text-green-800 px-4 py-2 mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <form method="POST" action="{{ route('kasir.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <h6 class="text-cyan-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Informasi Barang
                        </h6>
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-cyan-600 text-xs font-bold mb-2"
                                        htmlfor="id_barang">
                                        ID Barang
                                    </label>
                                    <input type="number" name="id_barang" id="id_barang"
                                        placeholder="Logitech Mouse B100" required
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-cyan-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                </div>
                                @error('id_barang')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-cyan-600 text-xs font-bold mb-2"
                                        htmlfor="jumlah_barang">
                                        Jumlah Barang
                                    </label>
                                    <input type="number" name="jumlah_barang" id="jumlah_barang" placeholder="10"
                                        required
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-cyan-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                </div>
                                @error('jumlah_barang')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-cyan-600 text-xs font-bold mb-2"
                                        htmlfor="diskon">
                                        Diskon
                                    </label>
                                    <div class="flex">
                                        <input type="text" name="diskon" id="diskon" placeholder="2.5" required
                                            class="group
                                             border-0 px-3 py-3 placeholder-blueGray-300 text-cyan-600 bg-white rounded-l text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                        <p
                                            class="w-1/12 border-0 px-4 py-3 text-cyan-600 bg-white rounded-r text-sm shadow group-focus:outline-none group-focus:ring ease-linear transition-all duration-150">
                                            %</p>
                                    </div>
                                </div>
                                @error('diskon')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-cyan-600 text-xs font-bold mb-2"
                                        htmlfor="metode_bayar">
                                        Metode Bayar
                                    </label>
                                    <input type="text" name="metode_bayar" id="metode_bayar"
                                        placeholder="Bank, OVO, ShopeePay, GoPay" required
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-cyan-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                </div>
                                @error('metode_bayar')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <hr class="mt-6 border-b-1 border-blueGray-300">

                        <h6 class="text-cyan-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Dokumen
                        </h6>
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-cyan-600 text-xs font-bold mb-2"
                                        htmlfor="bukti_transaksi">
                                        Bukti Transaksi
                                    </label>
                                    <input type="file" name="bukti_transaksi" id="bukti_transaksi" accept="image/*"
                                        enctype="multipart/form-data" required
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-cyan-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                </div>
                                @error('bukti_transaksi')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end">
                            <button class="bg-cyan-400 hover:bg-cyan-500 text-white font-bold py-2 px-4 rounded">
                                Submit
                            </button>
                        </div>
                        @if ($errors->has('database_error'))
                            <div class="mt-4 text-red-500">
                                {{ $errors->first('database_error') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
