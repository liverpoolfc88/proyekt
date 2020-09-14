<template>
    <div class="home">
        <h1>fans</h1>
        <div style="width: 400px !important; height: 400px !important;">
        <canvas ref="canvas"></canvas>
        </div>

<!--        <v-data-table-->
<!--                :headers="headers"-->
<!--                :items="desserts"-->
<!--                :page.sync="page"-->
<!--                :items-per-page="itemsPerPage"-->
<!--                hide-default-footer-->
<!--                class="elevation-1"-->
<!--                @page-count="pageCount = $event"-->
<!--        >-->
<!--            <template slot="headers" slot-scope="props">-->
<!--                <tr>-->
<!--                    <th-->
<!--                            v-for="header in props.headers"-->
<!--                            :key="header.text"-->
<!--                            :rowspan="header.rowspan"-->
<!--                    >-->

<!--                    </th>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <th-->
<!--                            v-for="header in headers2"-->
<!--                            :key="header.text"-->
<!--                            :class="['column sortable', pagination.descending ? 'desc' : 'asc', header.value === pagination.sortBy ? 'active' : '']"-->
<!--                            @click="changeSort(header.value)"-->
<!--                    >-->
<!--                        <v-icon small>arrow_upward</v-icon>-->
<!--                        {{ header.text }}-->
<!--                    </th>-->
<!--                </tr>-->



<!--            </template>-->
<!--        </v-data-table>-->
        <v-data-table
                :headers="headers"
                :items="items"
                :pagination.sync="pagination"
                item-key="name"
                class="elevation-1"
        >
            <template slot="headers" slot-scope="props">
                <tr>
                    <th
                            v-for="header in props.headers"
                            :key="header.text"
                            :rowspan="header.rowspan"
                            :class="['column sortable', pagination.descending ? 'desc' : 'asc', header.value === pagination.sortBy ? 'active' : '']"
                            @click="changeSort(header.value)"
                    >
                        <v-icon small>arrow_upward</v-icon>
                        {{ header.text }}
                    </th>
                </tr><tr>
                <th
                        v-for="header in headers2"
                        :key="header.text"
                        :class="['column sortable', pagination.descending ? 'desc' : 'asc', header.value === pagination.sortBy ? 'active' : '']"
                        @click="changeSort(header.value)"
                >
                    <v-icon small>arrow_upward</v-icon>
                    {{ header.text }}
                </th>
            </tr>
            </template>
            <template slot="items" slot-scope="props">
                <tbody>
                <tr>
                    <td rowspan="2">{{ props.item.name }}</td>
                    <td rowspan="2" class="text-xs-right">{{ props.item.calories }}</td>
                    <td class="text-xs-right">{{ props.item.fat }}</td>
                    <td class="text-xs-right">{{ props.item.carbs }}</td>
                </tr>
                <tr>
                    <td class="text-xs-right">{{ props.item.protein }}</td>
                    <td class="text-xs-right">{{ props.item.iron }}</td>
                </tr>
                </tbody>
            </template>
        </v-data-table>
    </div>

</template>

<script>

    import { Bar } from "vue-chartjs";

    export default {
        name: "Chart",
        extends: Bar,
        data() {
            return {
                headers: [
                    {
                        text: 'Dessert (100g serving)',
                        align: 'left',
                        value: 'name',
                        rowspan: '2',
                    },
                    { text: 'Calories', value: 'calories',
                        rowspan: '2',
                    },
                    { text: 'Fat (g)', value: 'fat',
                        rowspan: '1', },
                    { text: 'Carbs (g)', value: 'carbs',
                        rowspan: '1', },
                ],
                headers2: [
                    { text: 'Protein (g)', value: 'protein' },
                    { text: 'Iron (%)', value: 'iron' }
                ],
                items: [
                    {
                        value: false,
                        name: 'Frozen Yogurt',
                        calories: 159,
                        fat: 6.0,
                        carbs: 24,
                        protein: 4.0,
                        iron: '1%'
                    },
                    {
                        value: false,
                        name: 'Ice cream sandwich',
                        calories: 237,
                        fat: 9.0,
                        carbs: 37,
                        protein: 4.3,
                        iron: '1%'
                    },
                    {
                        value: false,
                        name: 'Eclair',
                        calories: 262,
                        fat: 16.0,
                        carbs: 23,
                        protein: 6.0,
                        iron: '7%'
                    },
                    {
                        value: false,
                        name: 'Cupcake',
                        calories: 305,
                        fat: 3.7,
                        carbs: 67,
                        protein: 4.3,
                        iron: '8%'
                    },
                    {
                        value: false,
                        name: 'Gingerbread',
                        calories: 356,
                        fat: 16.0,
                        carbs: 49,
                        protein: 3.9,
                        iron: '16%'
                    },
                    {
                        value: false,
                        name: 'Jelly bean',
                        calories: 375,
                        fat: 0.0,
                        carbs: 94,
                        protein: 0.0,
                        iron: '0%'
                    },
                    {
                        value: false,
                        name: 'Lollipop',
                        calories: 392,
                        fat: 0.2,
                        carbs: 98,
                        protein: 0,
                        iron: '2%'
                    },
                    {
                        value: false,
                        name: 'Honeycomb',
                        calories: 408,
                        fat: 3.2,
                        carbs: 87,
                        protein: 6.5,
                        iron: '45%'
                    },
                    {
                        value: false,
                        name: 'Donut',
                        calories: 452,
                        fat: 25.0,
                        carbs: 51,
                        protein: 4.9,
                        iron: '22%'
                    },
                    {
                        value: false,
                        name: 'KitKat',
                        calories: 518,
                        fat: 26.0,
                        carbs: 65,
                        protein: 7,
                        iron: '6%'
                    }
                ],
                page: 1,
                pageCount: 0,
                itemsPerPage: 10,
                // headers: [
                //     {
                //         text: 'Dessert (100g serving)',
                //         align: 'start',
                //         sortable: false,
                //         value: 'name',
                //         rowspan: '2'
                //     },
                //     { text: 'Calories', value: 'calories' },
                //     { text: 'Fat (g)', value: 'fat' },
                //     { text: 'Carbs (g)', value: 'carbs' },
                //     { text: 'Protein (g)', value: 'protein' },
                //     { text: 'Iron (%)', value: 'iron' },
                // ],
                // desserts: [
                //     {
                //         name: 'Frozen Yogurt',
                //         calories: 159,
                //         fat: 6.0,
                //         carbs: 24,
                //         protein: 4.0,
                //         iron: '1%',
                //     },
                //     {
                //         name: 'Ice cream sandwich',
                //         calories: 237,
                //         fat: 9.0,
                //         carbs: 37,
                //         protein: 4.3,
                //         iron: '1%',
                //     },
                //     {
                //         name: 'Eclair',
                //         calories: 262,
                //         fat: 16.0,
                //         carbs: 23,
                //         protein: 6.0,
                //         iron: '7%',
                //     },
                //     {
                //         name: 'Cupcake',
                //         calories: 305,
                //         fat: 3.7,
                //         carbs: 67,
                //         protein: 4.3,
                //         iron: '8%',
                //     },
                //     {
                //         name: 'Gingerbread',
                //         calories: 356,
                //         fat: 16.0,
                //         carbs: 49,
                //         protein: 3.9,
                //         iron: '16%',
                //     },
                //     {
                //         name: 'Jelly bean',
                //         calories: 375,
                //         fat: 0.0,
                //         carbs: 94,
                //         protein: 0.0,
                //         iron: '0%',
                //     },
                //     {
                //         name: 'Lollipop',
                //         calories: 392,
                //         fat: 0.2,
                //         carbs: 98,
                //         protein: 0,
                //         iron: '2%',
                //     },
                //     {
                //         name: 'Honeycomb',
                //         calories: 408,
                //         fat: 3.2,
                //         carbs: 87,
                //         protein: 6.5,
                //         iron: '45%',
                //     },
                //     {
                //         name: 'Donut',
                //         calories: 452,
                //         fat: 25.0,
                //         carbs: 51,
                //         protein: 4.9,
                //         iron: '22%',
                //     },
                //     {
                //         name: 'KitKat',
                //         calories: 518,
                //         fat: 26.0,
                //         carbs: 65,
                //         protein: 7,
                //         iron: '6%',
                //     },
                // ],
                type: 'Bar',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: 'of Votes',
                        data: [2, 5, 8, 15, 21, 35],
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
<style scoped>
    tbody {
    tr:hover {
        background-color: transparent !important;
    }
    &:hover {
         background-color: rgba(0, 0, 0, 0.12);
     }
    }
</style>