<template>

    <div class="home">
        <h1>Anfild</h1>
        <div class="container">
            <v-row>
                <v-col cols="12" md="8">
                    <div v-for="(video,i) in videoPlayer" :key="i">
                        <!--               <div style="height: 300px; width:500px" v-html="video.videolink">-->

                            <iframe width="100%" height="500" :src="video.videolink" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <!--                   {{ video.videolink }}-->

                        {{ video.title }}
                        {{ video.date }}

                    </div>
                </v-col>
                <v-col cols="6" md="4">
                    456
                </v-col>
            </v-row>
        </div>

    </div>
</template>
<script>
    export default {

        computed: {
            videoPlayer(){
                return[
                    {
                        videolink: 'https://www.youtube.com/embed/uqXmXHnPH0Q',
                        title: 'Buklet',
                        date: '12.07.2020',
                        view: 21
                    },
                    {
                        videolink: 'https://www.youtube.com/embed/uqXmXHnPH0Q',
                        title: 'Buklet',
                        date: '12.07.2020',
                        view: 21
                    },
                    {
                        videolink: 'https://www.youtube.com/embed/aiZ7NGw8yqI',
                        title: 'Buklet',
                        date: '12.07.2020',
                        view: 21
                    }
                ]
            }
        }
    }
</script>

<!--<iframe width="902" height="541" src="https://www.youtube.com/embed/aiZ7NGw8yqI" frameborder="0"-->
<!--        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->

