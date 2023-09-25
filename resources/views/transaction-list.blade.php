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
                            Transaction List
                        </h6>
                        <button class="bg-cyan-400 hover:bg-cyan-500 text-white font-bold py-2 px-4 rounded" onclick="window.location.href='/transaction-form'">
                            Tambah
                        </button>
                    </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 p-10">
                    <div class="grid grid-cols-7 rounded-t border border-black px-3 py-3">
                        <p class="text-center">ID</p>
                        <p class="text-center">ID Barang</p>
                        <p class="text-center">Quantity</p>
                        <p class="text-center">Total Harga</p>
                        <p class="text-center">Diskon</p>
                        <p class="text-center">Metode Bayar</p>
                        <p class="text-center">Bukti Transaksi</p>
                    </div>
                    <div class="grid grid-cols-7 border border-black px-3 py-3 gap-3 place-items-center">
                        @foreach ($items as $item)
                            <p class="text-center">{{ $item->id }}</p>
                            <p class="text-center">{{ $item->id_barang }}</p>
                            <p class="text-center">{{ $item->qty }}</p>
                            <p class="text-center">{{ $item->total_bayar }}</p>
                            <p class="text-center">{{ $item->diskon }}%</p>
                            <p class="text-center">{{ $item->metode_bayar }}</p>
                            <img src="{{ asset('storage/' . $item->bukti_transaksi) }}"
                                alt="Bukti Transaksi {{ $item->id }}">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
