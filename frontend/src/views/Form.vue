<template>
    <v-form>
        <v-container>
            <v-row>

                <v-col class="d-flex" cols="12" sm="6" md="3">
                    <v-autocomplete
                            v-model="values"
                            :items="items"
                            outlined
                            label="Outlined"
                    ></v-autocomplete>
                </v-col>

                <v-col cols="12" sm="6" md="3">
                    <v-text-field
                            label="Outlined"
                            outlined
                    ></v-text-field>
                </v-col>

                <v-col cols="12" sm="6" md="3">
                    <v-text-field
                            label="Outlined"
                            outlined
                    ></v-text-field>
                </v-col>

                <v-col cols="12" sm="6" md="3">
                    <v-text-field
                            label="Outlined"
                            outlined
                    ></v-text-field>
                </v-col>

            </v-row>
        </v-container>
    </v-form>
</template>

<script>
    export default {
        data: () => ({
            items: ['Liverpool', 'Barselona', 'Bavarya', 'Yuventus'],
            values: ''
        }),
    }
</script>