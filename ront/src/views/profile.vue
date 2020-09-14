<template>
    <div class="home">
        <app-navbar/>
        <app-chart/>
        <h1>fans</h1>
    </div>
</template>
<script>
    import axios from "axios";
    import AppNavbar from '@/components/AppNavbar'
    import AppChart from '@/components/AppChart'

    export default {

        nbu: null,
        components:{
            AppNavbar,
            AppChart

        },


        methods: {
            getList() {
                axios
                    .get("https://nbu.uz/uz/exchange-rates/json")
                    .then((response) => {
                        console.log(response);
                        console.log(JSON.stringify(response.data));
                        this.nbu = response.data;
                    })
                    .catch(function (error) {
                        console.error(error);
                        this.loading = false;
                    });
            },
        },
        mounted() {
            this.getList();
            // axios.get('https://nbu.uz/uz/exchange-rates/json')
            //     .then(res => this.post = res.data);
        },

    }



</script>
