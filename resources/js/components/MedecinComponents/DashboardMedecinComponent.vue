<template>
    <div class="content-wrapper">

    <div class="container">
        <div class="row justify-content-center">


                    <div class="card-body">

                        <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ nbr_malade }}</h3>

                                <p>Malades</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="/ajouter_malade"  class="small-box-footer">Ajouter un malade <i class="fas fa-arrow-circle-right"></i></a>
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
        nbr_malade:"",
        }

    },
    methods:{
 getNomberDeMalade(){
     axios.get('nombre_de_malade').then((data)=>{
         this.nbr_malade = data.data
     })
 }
    },
    created() {
       this.getNomberDeMalade();
    }
}
</script>
