<template>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title" >Ajout d'un malade</h2>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nom</label>
                                <input v-model="nom" type="text" class="form-control" id="inputEmail4" placeholder="Nom">
                                <div
                                    v-if="nomErrors !== ''"
                                >
                                    <p class="text-danger">
                                        {{ nomErrors }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Prenom</label>
                                <input v-model="prenom"  type="text" class="form-control" id="inputPassword4" placeholder="Prenom">
                                <div
                                    v-if="prenomErrors !== ''"
                                >
                                    <p class="text-danger">
                                        {{ prenomErrors }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Mobile</label>
                            <input v-model="mobile"  type="text" class="form-control" id="inputAddress" placeholder="05 42 48 76 63">
                            <div
                                v-if="mobileErrors !== ''"
                            >
                                <p class="text-danger">
                                    {{ mobileErrors }}
                                </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address </label>
                            <input v-model="address"  type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>


                        <button @click="ajouterPersonne" class="btn btn-primary">Ajouter un Malade</button>

                </div>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    data() {
        return {
            nom: "",
            prenom: "",
            address: "",
            mobile: "",
            nomErrors: "",
            prenomErrors: "",
            addressErrors: "",
            mobileErrors: "",

        };
    },
    methods: {
        ajouterPersonne(){
            this.nomErrors= "";
                this.prenomErrors= "";
                this.addressErrors= "";
                this.mobileErrors= "";
            var formData = new FormData();
            formData.append('nom',this.nom)
            formData.append('prenom',this.prenom)
            formData.append('address',this.address)
            formData.append('mobile',this.mobile)

            axios.post('/ajouter_malade',formData,{
                headers: {"Content-Type": "multipart/form-data"}
            }).then(()=>{
                Swal.fire(
                    'Malade ajouter!',
                    'Le malade a ete ajouté !',
                    'success'
                )

            }).catch(error => {
                if (error.response.data.errors.nom) {
                    this.nomErrors = error.response.data.errors.nom[0];
                }
                if (error.response.data.errors.address) {
                    this.addressErrors = error.response.data.errors.address[0];
                }
                if (error.response.data.errors.mobile) {
                    this.mobileErrors = error.response.data.errors.mobile[0];
                }
                if (error.response.data.errors.prenom) {
                    this.prenomErrors = error.response.data.errors.prenom[0];
                }
            })
        }
    }
}
</script>
