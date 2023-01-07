<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Tiket</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
    href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,400;0,600;0,700;0,800;0,900;1,400;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet"
    />

    <!-- Fontawesome -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
    />

	<link rel="stylesheet" href="{{ asset('styles/global-style.css') }}" />


</head>

<div class="flex flex-col items-center justify-center min-h-screen bg-center bg-cover"
	style="background-image: url('/assets/images/jumbotron.jpg');">
	<div class="absolute bg-blue-900 opacity-80 inset-0 z-0"></div>
	<div class="max-w-md w-full h-full mx-auto z-10 bg-blue-900 rounded-3xl">
		<div class="flex flex-col">
			<div class="bg-white relative drop-shadow-2xl  rounded-3xl p-4 m-4">
				<div class="flex-none sm:flex">
					<div class="flex-auto justify-evenly">
						<div class="flex items-center justify-between">
							<div class="flex items-center  my-1">
								<span class="mr-3 rounded-full bg-white w-8 h-8">
                                    <img src="/assets/icon/logo.svg" class="h-8 p-1">
                                </span>
								<h2 class="font-medium">UlinYuk</h2>
							</div>
							<div class="ml-auto text-blue-800">{{ $ticket->kode }}</div>
						</div>
						<div class="border-b border-dashed border-b-2 my-5"></div>
						<div class="flex items-center px-4 gap-4">
							<img class="w-20 h-20 rounded-xl" src="{{ Storage::url($ticket->travel->galeris->first()->foto) }}" alt="">
							<div class="flex flex-col">
								<h4 class="text-blue-800 font-medium text-lg">{{ $ticket->travel->nama_travel }}</h4>
								<p class="text-gray-400 text-sm">{{ $ticket->tiket->nama_tiket }}</p>
							</div>
						</div>
							<div class="border-b border-dashed border-b-2 my-5 pt-5">
								<div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -left-2"></div>
								<div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -right-2"></div>
							</div>
							<div class="flex items-center mb-5 p-5 text-sm">
								<div class="flex flex-col">
									<span class="text-sm">Nama</span>
									<div class="font-semibold">{{ $ticket->nama_pengunjung }}</div>
								</div>
							</div>
							<div class="flex items-center justify-between mb-4 px-5">
								<div class="flex flex-col text-sm">
									<span class="">Tanggal Kunjungan</span>
									<div class="font-semibold">{{ $ticket->tanggal_kunjungan }}</div>

								</div>
								<div class="flex items-end flex-col text-sm">
									<span class="">Jumlah Tiket</span>
									<div class="font-semibold">{{ $ticket->jumlah_tiket }}</div>
								</div>
							</div>
							<div class="border-b border-dashed border-b-2 my-5 pt-5">
								<div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -left-2"></div>
								<div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -right-2"></div>
							</div>
							<div class="flex flex-col py-2  justify-center text-sm ">
								<h6 class="font-bold text-center">QR Code</h6>

								<div class="flex justify-center align-middle">
                                    <img src="/assets/images/qrcode.png" class="w-40 p-1">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>