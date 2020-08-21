<template>
    <div>
        <div class="row no-gutters mt-4">
            <h4>Daily Total Selling Amount</h4>
        </div>
        <div class="row no-gutters">
            <div class="col-md-4 col-sm-10 col-lg-4">
                <div class="table-responsive mt-2">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr v-for="dailySum in dailySums" :key="dailySum.index">
                                <td style="width: 60%;">{{ dailySum.daily | myDate}}</td>
                                <!-- https://www.tutorialsplane.com/vue-js-round-two-decimal-places/ -->
                                <td style="width: 40%;">{{ numEdit(dailySum.total) | currency}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                dailySums: {},
            }
        },

        methods: {
            // https://www.tutorialsplane.com/vue-js-round-two-decimal-places/
            numEdit(floatNumber){
                var result = floatNumber.toFixed(2);
                return (result);
            },
        },

        created() {
            axios.post('/admin/getDailyOrderSum',{
                //
            })
            .then(response => {
                this.dailySums = response.data.dailySums;
            })
            .catch(error => {

            })
        },

        mounted() {

        }
    }
</script>
