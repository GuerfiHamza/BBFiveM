@extends('layouts.app')

@section('title', 'Profile')
@section('jstop')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

    <script>
        document.addEventListener("turbolinks:load", function() {

            var ctx = document.getElementById('playertreasorie').getContext('2d');

            Chart.defaults.global.defaultFontColor = "#fff";
            var playertreasorie = new Chart(ctx, {
                type: 'line',
                scaleFontColor: "#fff",
                data: {
                    labels: [
                        @foreach ($treasories as $treasory)
                            '{{ $treasory->created_at->format('d/m/Y G') }}h',
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Trésorerie',
                        data: [{{ $treasories->pluck('treasory')->implode(',') }}],
                        backgroundColor: ['rgba(0, 0, 0, 0.5)'],
                        borderColor: ['red'],
                        @foreach ($treasories as $treasory)
                            'black',
                        @endforeach],
                        borderWidth: 1
                    }, {
                        label: 'Entrée/Sortie',
                        data: [{{ $treasoriesDifference->pluck('treasory')->implode(',') }}],
                        backgroundColor: ['rgba(255, 166, 0, 0.5)'],
                        borderColor: ['rgba(255, 166, 0, 1)'],
                        @foreach ($treasories as $treasory)
                            'rgba(255, 166, 0, 0.5)',
                        @endforeach],
                        borderWidth: 1
                    }]
                },
            });
        })
    </script>
@stop
@section('content')
    @if (isset($BankSaving))
        <h1 class="mt-20 mb-10 leading-tight tracking-wide text-white font-bebas bold text-7xl pl-44">Compte épargne</h1>
        <hr class="w-64 h-3 mt-5 mb-10 bg-red-600 border-none rounded-full ml-44">

        <div class="flex justify-between mx-auto px-44">

            {{-- <div class="flex-1 px-20 py-20 mr-2 text-3xl text-white bg-gray-800 rounded-3xl font-lato"><p class="text-5xl">{{ number_format($players->bank) }} $</p><p class="text-base">Sur votre compte</p></div> --}}
            <div class="flex-1 px-20 py-20 mr-2 text-3xl z-30 text-white bg-gray-900 rounded-3xl font-lato">
                <p class="text-5xl">{{ number_format($BankSaving->tot) }} $</p>
                <p class="text-base">Sur votre compte épargne</p>
            </div>

        </div>
        <div class="container flex justify-between mx-auto mt-5">
            <div class="hover:shadow-5xl transition-shadow duration-500 w-full mr-5">
                <a data-turbolinks="false" onclick="toggleModalAdd({userName: '', userId: '{{ $BankSaving->id }}'})"
                    class="relative inline-block w-full px-5 py-3 text-base font-medium leading-6 text-center bg-green-800 text-white transition duration-150 ease-in-out rounded-md md:inline-flex md:shadow-sm hover:bg-green-500 focus:outline-none focus:shadow-outline cursor-pointer">Ajouter
                    de l'argent</a>

            </div>
            <div class="hover:shadow-3xl transition-shadow duration-500 w-full">

                <a data-turbolinks="false" onclick="toggleModalRemove({userName: '', userId: '{{ $BankSaving->id }}'})"
                    class="relative inline-block w-full px-5 py-3 text-base font-medium leading-6 text-center bg-red-dark text-white transition duration-150 ease-in-out rounded-md md:inline-flex md:shadow-sm hover:bg-red-light focus:outline-none focus:shadow-outline cursor-pointer">Retirer
                    de l'argent</a>
            </div>

        </div>
        <div id="modalAdd"
            class="fixed z-50 top-0 left-0 flex items-center justify-center w-full h-full opacity-0 pointer-events-none modal">
            <div class="absolute top-0 left-0 w-full h-full bg-black opacity-25 cursor-pointer modal-overlay"
                onclick="toggleModalAdd()"></div>
            <div class="absolute w-1/2 p-4 bg-gray-900 text-white rounded-xl shadow-lg ">
                <h3 class="mb-8 text-2xl text-center font-opensans">Ajouter de l'argent <span id="user-promoted"></span>
                </h3>
                <form action="{{ route('bank-update', $BankSaving) }}" method="post">
                    @csrf
                    {{ method_field('POST') }}
                    <input type="hidden" value="{{ $BankSaving->id }}" name="id">


                    <p class="text-2xl text-center font-opensans">Vous avez
                        {{ number_format(\Auth::user()->players->bank) }} $</p>
                    <input type="hidden" name="user" id="promote-user">
                    <input type="number" name="tot" id="retire-name" placeholder="Argent"
                        class="block w-full px-3 py-2 my-2 border border-gray-500 rounded">
                    <div class="container flex mx-auto mt-5">

                        <div class="hover:shadow-5xl transition-shadow duration-500 mr-5">
                            <button type="submit"
                                class="relative inline-block px-4 py-2 mx-auto text-white bg-green-600 rounded shadow font-opensans">Ajouter</button>
                        </div>
                        <div class="hover:shadow-3xl transition-shadow duration-500 mr-5">

                            <a data-turbolinks="false" onclick="toggleModalAdd()"
                                class="relative inline-block px-4 py-2 mx-auto text-white bg-red-dark rounded shadow font-opensans">Annuler</a>
                        </div>

                    </div>

                </form>
            </div>
        </div>
        <div id="modalRemove"
            class="fixed z-50 top-0 left-0 flex items-center justify-center w-full h-full opacity-0 pointer-events-none modal">
            <div class="absolute top-0 left-0 w-full h-full bg-black opacity-25 cursor-pointer modal-overlay"
                onclick="toggleModalRemove()"></div>
            <div class="absolute w-1/2 p-4 bg-gray-900 text-white rounded-xl shadow-lg">
                <h3 class="mb-8 text-2xl text-center font-opensans">Retirez de l'argent <span id="user-promoted"></span>
                </h3>
                <form action="{{ route('bank-remove', $BankSaving) }}" method="post">
                    @csrf
                    {{ method_field('POST') }}
                    <input type="hidden" value="{{ $BankSaving->id }}" name="id">

                    <p class="text-2xl text-center font-opensans">Vous avez {{ number_format($BankSaving->tot) }} $</p>

                    <input type="hidden" name="user" id="promote-user">
                    <input type="number" name="tot" id="retire-name" placeholder="Argent"
                        class="block w-full px-3 py-2 my-2 border border-gray-500 rounded">
                        <div class="container flex mx-auto mt-5">

                            <div class="hover:shadow-5xl transition-shadow duration-500 mr-5">
                                <button type="submit"
                                    class="relative inline-block px-4 py-2 mx-auto text-white bg-green-600 rounded shadow font-opensans">Retirer</button>
                            </div>
                            <div class="hover:shadow-3xl transition-shadow duration-500 mr-5">
    
                                <a data-turbolinks="false" onclick="toggleModalAdd()"
                                    class="relative inline-block px-4 py-2 mx-auto text-white bg-red-dark rounded shadow font-opensans">Annuler</a>
                            </div>
    
                        </div>
                </form>
            </div>
        </div>
    @endif
    <h1 class="mt-20 mb-10 leading-tight tracking-wide text-white font-bebas bold text-7xl pl-44">Trésorerie</h1>
    <hr class="w-64 h-3 mt-5 mb-10 bg-red-600 border-none rounded-full ml-44">

    <div class="flex justify-between mx-auto px-44">
        <div class="card col-12">

            <canvas id="playertreasorie" width="1600" height="500"></canvas>


        </div>
    </div>
    </section>

@endsection

@section('js')
    <script>
        function toggleModalAdd(infos = null) {
            const modal = document.querySelector('#modalAdd')

            if (infos) {
                document.getElementById('promote-user').value = infos['userId'];
                document.getElementById('user-promoted').innerHTML = infos['userName'];
            }

            modal.classList.toggle('opacity-0')
            modal.classList.toggle('pointer-events-none')
        }
    </script>
    <script>
        function toggleModalRemove(infos = null) {
            const modal = document.querySelector('#modalRemove')

            if (infos) {
                document.getElementById('promote-user').value = infos['userId'];
                document.getElementById('user-promoted').innerHTML = infos['userName'];
            }

            modal.classList.toggle('opacity-0')
            modal.classList.toggle('pointer-events-none')
        }
    </script>

@stop
