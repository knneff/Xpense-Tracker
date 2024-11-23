<?php require('partials/headNoSide.php') ?>


<a href="/dashboard" class="text-teal-300 hover:underline">TEMPORARY DASHBOARD HYPERLINK HERE</a>

<div class="bg-[#03352c] text-gray-300">
  <div class="xl:container mx-auto text-center relative ">
    <section>
      <h1 class="text-4xl font-bold p-5">Lorem ipsum dolor sit amet</h1>
      <h2 class="text-xl p-5">Lorem ipsum dolor sit amet</h2>
      <button class="cursor-pointer p-5 transition-transform rounded-full text-gray-300 uppercase text-xl font-semibold hover:scale-110 bg-[#1a664d] hover:bg-[#165440]">
        Get Started
      </button>
    </section>
    <br><br><br><br><br>
    <!-- SVG Separator -->
    <section class=" w-auto md:w-auto lg:w-auto xl:w-auto 2xl:w-auto justify-center">
      <div class="bg-[#1a664d] rotate-180" style="transform: scaleY(-1);">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 99" class="w-full h-auto">
          <path d="M737.9,94.7L0,0v100h1000V0L737.9,94.7z" fill="#03352c"></path>
        </svg>
        
      </div>

      <div class="absolute top-[200px] left-0 right-0 mx-auto w-full  py-10">
        <div class="flex justify-around items-center gap-5">
          <img src="assets\iphone-175x300.png" alt="iPhone image" class="h-24 md:h-48 lg:h-64">
          <img src="assets\main-grocery-store-1-300x208.png" alt="Grocery store image" class="h-24 md:h-48 lg:h-52">
        </div>
      </div>

      <div class="bg-[#1a664d] py-20 flex justify-center">
        <div class="py-10">
        <h1 class="text-4xl font-bold mb-5 ">How it works</h1>
        </div>
        <div class="py-20">
        <p class="text-xl max-w-2xl mx-auto">
          Goodbudget is a budget tracker for the modern age. Say no more to carrying paper envelopes. This virtual budget program keeps you on track with family and friends using the time-tested envelope budgeting method.
        </p>
        </div>
      </div>

      <!-- SVG Separator flipped -->
      <div class="bg-[#1a664d] -rotate-180" style="transform: scaleX(-1);">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 99" class="w-full h-auto">
          <path d="M737.9,94.7L0,0v100h1000V0L737.9,94.7z" fill="#03352c"></path>
        </svg>
      </div>
    </section>
  </div>
</div>

<?php require('partials/footer.php') ?>
