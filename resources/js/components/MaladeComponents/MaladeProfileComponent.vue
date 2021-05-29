<template>
    <div class="content-wrapper">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card card-default  h-100">
                        <div class="card-header card-header-border-bottom justify-content-between">
                            <h2>Malade Informations</h2>
                        </div>

                        <div class="card-body h6">
                            <div class="row my-3">
                                <div class="col-3">Nom :</div>
                                <div class="col-9">{{ malade.nom }}</div>
                            </div>
                            <div class="row my-3">
                                <div class="col-3">Prenom :</div>
                                <div class="col-9">{{ malade.prenom }}</div>
                            </div>
                            <div class="row my-3">
                                <div class="col-3">Address :</div>
                                <div class="col-9">{{ malade.address }}</div>
                            </div>
                            <div class="row my-3">
                                <div class="col-3">Mobile :</div>
                                <div class="col-3">{{ malade.mobile }}</div>

                            </div>
                            <div class="row my-3">
                                <div class="col-3">Antécedants :</div>

                                <div class="col-2" v-for="antecedant in antecedants " :key="antecedant">
                                    <h4 class="text-danger">{{antecedant}}</h4>
                                </div>

                            </div>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">
                                Assign a delivery agent
                            </button>
                            <div class="row my-3">
                                <div class="col">Products</div>
                            </div>
                            <div class="row my-3">
                                <div class="col">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Code</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="font-weight-normal h6">
                                            <th>1234001</th>
                                            <td>test</td>
                                            <td>500.00</td>
                                            <td>1</td>
                                            <td>500
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

            </div>
        </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>


export default {
    data() {
        return {
            malade:{},
            antecedants:{}

        };
    },
    methods: {
        getAntecedants(){
            axios.get('/malade_antecedants/'+this.malade.id).then((data)=> {

                this.antecedants=data.data
            })
        }
    },

    created() {
    this.malade=this.$attrs.malade
           this.getAntecedants()

    },
}

</script>
