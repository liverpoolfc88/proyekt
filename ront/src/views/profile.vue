<template>
    <div class="home">
        <app-navbar/>
        <app-chart/>
        <h1>fans</h1>
    </div>
</template>
<script>
    import AppNavbar from '@/components/AppNavbar'
    import AppChart from '@/components/AppChart'

    export default {
        components:{
            AppNavbar,
            AppChart

        }
    }
</script>
