<template>
    <div class="justify-center items-center" style="margin-top: 20px;">
    <input type="date" name="" id="d1">

    <input type="date" name="" id="d2">
    <button type="submit" @click="clicFun"
                        class="w-28 px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                        Sign up
                    </button><p id="out"></p>
            <span v-if="completedSteps >= 27 " class="ml-8"> Task complete</span>

    </div>
    <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">
    <img src="/img/beams.jpg" alt="" class="absolute top-1/2 left-1/2 max-w-none -translate-x-1/2 -translate-y-1/2" width="1308" />
    <div class="absolute inset-0 bg-[url(/img/grid.svg)] bg-center [mask-image:linear-gradient(180deg,white,rgba(255,255,255,0))]"></div>
    <div class="relative bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10">
        <div class="mx-auto max-w-md">
        <div class="divide-y divide-gray-300/50">
        <radial-progress-bar :diameter="200"
                            :completed-steps="completedSteps"
                            :total-steps="totalSteps"
                            start-color="orange"
                            stop-color="pink"
                            inner-stroke-color="transparent"
                            strokeWidth=20>
        <div style="background-attachment: fixed;">
            <p>Luteal Phase</p>
            <span class="ml-8"> {{ completedSteps + 1}}</span>
        </div>  
        </radial-progress-bar>
        </div>
        </div>
    </div>
    </div>

</template>
<script>

import RadialProgressBar from 'vue-radial-progress'
 
export default {
 components: {
    RadialProgressBar
  },
  data () {
    return {
      completedSteps: '',
      totalSteps: 27,
      message:''
    }
  },
  methods:{
    clicFun(){
       var olddate = document.getElementById("d1").value;
       var currentDate = document.getElementById("d2").value ;
        const dateOne = new Date(olddate);
        const dateTwo = new Date(currentDate);
        const time = Math.abs(dateTwo - dateOne);
        const days = Math.ceil(time / (1000* 60*60* 24));
        console.log(days)
        return this.completedSteps = days;
        
    },
    created() {
     
    }
  }
 
  
}
</script>