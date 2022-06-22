<template>
   <body class="ad flex items-start w-screen h-screen" >

	<!-- Component Start -->
	<div class="relative flex flex-col  group">
		<h1>Aadrsh Sharma</h1>
		<div class="absolute bottom-0 flex flex-col items-center hidden mb-6 group-hover:flex">
			<span class="relative z-10 p-2 text-xs leading-none text-white whitespace-no-wrap bg-white shadow-lg">
            <div id="tooltip1" role="tooltip" class="z-20 -mt-20 w-64 absolute transition duration-150 ease-in-out left-0 ml-8 shadow-lg bg-white p-4 rounded">
			<p class="text-sm font-bold text-gray-800 pb-1">Aadrsh Sharma</p>
                        <p class="text-xs leading-4 text-gray-600 pb-3">Frontend developer</p>
                        <div class="flex justify-between">
                            <div class="flex items-center">
                                <span class="text-xs font-bold text-indigo-700">Step 1 of 4</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-xs text-gray-600 underline mr-2 cursor-pointer">Skip Tour</span>
                                <button class="focus:outline-none bg-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 rounded text-white px-5 py-1 text-xs">Follow</button>
                            </div>
                            </div>
			</div>
			</span>
			<div class="w-3 h-3 -mt-2 rotate-45 bg-black"></div>
		</div>
	</div>
	<!-- Component End  -->

</body>
</template>

<script>
export default {
    name: "WithStepsAlternate",
};
</script>
<style scoped>
.ad{
    margin-left: 40rem;
    margin-top: 20rem;
}
</style>