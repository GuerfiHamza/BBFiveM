@extends('dashboard.layouts.app')
@section('title', 'Dashboard')
@section('content')
    
    <div class="container px-6 mx-auto grid">
      <h2
        class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
      >
        Dashboard
      </h2>
   
      <!-- Cards -->
      <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <!-- Card -->
        <div
          class="flex items-center p-4  rounded-lg shadow-xs bg-gray-200 dark:bg-gray-800"
        >
          <div
            class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
          >
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
              <path
                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
              ></path>
            </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Total Joueurs
            </p>
            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
              {{$users}}
            </p>
          </div>
        </div>
        <!-- Card -->
        <div
          class="flex items-center p-4  rounded-lg shadow-xs bg-gray-200 dark:bg-gray-800"
        >
          <div
            class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
          >
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
              <path
                fill-rule="evenodd"
                d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Argent en ville (Banque)
            </p>
            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
            

              {{number_format($bank, 2)}} $
             
            </p>
          </div>
        </div>
        
        <!-- Card -->
        <div
          class="flex items-center p-4  rounded-lg shadow-xs bg-gray-200 dark:bg-gray-800"
        >
          <div
            class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
          >
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
              fill-rule="evenodd"
              d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
              clip-rule="evenodd"
            ></path>
          </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Argent des entreprises
            </p>
            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
              {{number_format($entreprisemoney, 2)}} $
            </p>
          </div>
        </div>
        <!-- Card -->
        <div
          class="flex items-center p-4  rounded-lg shadow-xs bg-gray-200 dark:bg-gray-800"
        >
          <div
            class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
          >
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 172 172" class="w-5 h-5" >
          <g fill="none" fill-rule="nonzero"  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               stroke-dasharray=""
              stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none"
              text-anchor="none" style="mix-blend-mode: normal">
              <g fill="#ffffff">
                  <path
                      d="M69.49838,43.67188c-5.5437,-0.00757 -10.776,2.56203 -14.15924,6.95364l-15.12309,19.82884l-18.02449,4.93146c-10.34251,2.8517 -17.50236,12.26556 -17.48843,22.994v13.40207c0,1.48451 1.05045,2.7728 2.53462,2.7728h14.01227c1.86876,8.17705 9.14255,13.97605 17.53043,13.97605c8.38788,0 15.66167,-5.799 17.53043,-13.97605h57.48927c1.86876,8.17705 9.14255,13.97605 17.53042,13.97605c8.38787,0 15.66167,-5.799 17.53042,-13.97605h15.90126c1.48417,0 2.53462,-1.28829 2.53462,-2.7728v-15.93144c0.01882,-9.33702 -5.41673,-17.82492 -13.90532,-21.7139l-7.59468,-3.47026l-11.73288,-18.70293c-3.23933,-5.19411 -8.9434,-8.33359 -15.0647,-8.29149zM69.49838,49.04688h7.87485l-1.61604,21.16406h-28.62227l12.48021,-16.32643c2.36302,-3.06155 6.01585,-4.84953 9.88326,-4.83763zM82.76332,49.04688h21.25198l1.59636,21.16406h-24.46439zM109.4054,49.04688h9.5939c4.27336,-0.03646 8.25927,2.14815 10.52757,5.76999l9.67985,15.39407h-28.20562zM41.72318,75.58594h101.94391l7.5002,3.44401c6.57163,3.01452 10.77613,9.59048 10.75459,16.8205v13.32924h-12.6613c-0.71035,-9.37691 -8.5259,-16.62278 -17.92968,-16.62278c-9.40378,0 -17.21933,7.24587 -17.92968,16.62278h-56.69142c-0.71248,-9.37508 -8.52724,-16.61847 -17.92935,-16.61847c-9.40212,0 -17.21687,7.24338 -17.92935,16.61847h-10.77296v-10.79987c-0.01793,-8.30962 5.52128,-15.60586 13.53001,-17.82175zM38.2562,97.85886c3.4329,-0.14273 6.77543,1.12132 9.25484,3.49991c2.47941,2.3786 3.88103,5.66581 3.88084,9.10168c-0.00832,6.96155 -5.64989,12.60282 -12.61144,12.61078v0.00066c-6.86691,0.00532 -12.47607,-5.48416 -12.61882,-12.34959c-0.14275,-6.86543 5.23337,-12.58332 12.09457,-12.86344zM130.80698,97.85886c3.4329,-0.14273 6.77543,1.12132 9.25484,3.49991c2.47941,2.3786 3.88103,5.66581 3.88084,9.10168c-0.00832,6.9618 -5.65029,12.60318 -12.61209,12.61078l0.00066,0.00066c-6.86691,0.00532 -12.47607,-5.48416 -12.61882,-12.34959c-0.14275,-6.86543 5.23337,-12.58332 12.09457,-12.86344zM131.33057,99.86201c-4.28643,-0.00002 -8.15079,2.58205 -9.79114,6.54219c-1.64035,3.96014 -0.73365,8.51846 2.29731,11.54942c3.03096,3.03096 7.58928,3.93766 11.54942,2.29731c3.96014,-1.64035 6.54221,-5.50472 6.54219,-9.79114c-0.00669,-5.85022 -4.74756,-10.59109 -10.59778,-10.59778zM38.78044,100.55882c-4.00464,-0.00005 -7.61497,2.41226 -9.1475,6.11205c-1.53253,3.69979 -0.68544,7.95845 2.14626,10.79016c2.83171,2.83171 7.09037,3.67879 10.79016,2.14626c3.69979,-1.53253 6.1121,-5.14287 6.11205,-9.1475c-0.00599,-5.46567 -4.4353,-9.89498 -9.90097,-9.90097zM131.11339,105.24161c1.4216,-0.05915 2.8058,0.46424 3.8326,1.44918c1.0268,0.98494 1.60732,2.34617 1.60736,3.769c-0.00317,2.88315 -2.33963,5.21961 -5.22278,5.22278c-2.8407,-0.00204 -5.15886,-2.27412 -5.21794,-5.11421c-0.05908,-2.84008 2.16261,-5.20659 5.00076,-5.32676zM38.59213,105.93776c1.23195,-0.05127 2.4315,0.4023 3.32133,1.25584c0.88983,0.85354 1.39291,2.03318 1.39295,3.26619c-0.00266,2.49852 -2.02745,4.52331 -4.52597,4.52597c-2.46072,-0.00317 -4.46808,-1.97172 -4.51928,-4.43191c-0.0512,-2.46019 1.87252,-4.51055 4.33097,-4.6161z">
                  </path>
              </g>
          </g>
      </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Vehicules en ville
            </p>
            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
              {{$vehicule}}
            </p>
          </div>
        </div>
      </div>

      <!-- Charts -->
      <h2
        class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
      >
        Statistics
      </h2>
      <div class="grid bg-gray-200 dark:bg-gray-800 mb-8">
        <div
          class="min-w-0 p-4  rounded-lg shadow-xs dark:bg-gray-800"
        >
          <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
            Sexe
          </h4>
          <canvas id="pie"></canvas>
          <div
            class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400"
          >
            <!-- Chart legend -->
            <div class="flex items-center">
              <span
                class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"
              ></span>
              <span>Hommes</span>
            </div>
            
            <div class="flex items-center">
              <span
                class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"
              ></span>
              <span>Femmes</span>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('js')

<script type="text/javascript">
    /**
* For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
*/
const pieConfig = {
 type: 'doughnut',
 data: {
   datasets: [
     {
       data: [ {{$homme}},{{$femme}}],
       /**
        * These colors come from Tailwind CSS palette
        * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
        */
       backgroundColor: ['#1c64f2', '#7e3af2'],
       label: 'Dataset 1',
     },
   ],
   labels: ['Hommes', 'Femmes'],
 },
 options: {
   responsive: true,
   cutoutPercentage: 80,
   /**
    * Default legends are ugly and impossible to style.
    * See examples in charts.html to add your own legends
    *  */
   legend: {
     display: false,
   },
 },
}

// change this to the id of your chart element in HMTL
const pieCtx = document.getElementById('pie')
window.myPie = new Chart(pieCtx, pieConfig)
</script>
  @endsection