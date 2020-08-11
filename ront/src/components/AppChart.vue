<template>
    <div class="home">
        <h1>fans</h1>
        <div style="width: 600px !important; height: 400px !important;">
            <canvas ref="canvas"></canvas>
        </div>
    </div>
</template>

<script>

    import { PolarArea } from "vue-chartjs";

    export default {
        name: "Chart",
        extends: PolarArea,
        data() {
            return {
                type: 'PolarArea',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: 'of Votes',
                        data: [50, 35, 42, 39, 50, 35],
                        backgroundColor: [
                            'rgba(255, 99, 132)',
                            'rgba(54, 162, 235)',
                            'rgba(255, 206, 86)',
                            'rgba(75, 192, 192)',
                            'rgba(153, 102, 255)',
                            'rgba(255, 159, 64)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            };
        },
        mounted() {
            this.renderChart(this.data, this.options);
        }
    };
</script>