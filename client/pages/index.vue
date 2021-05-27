<template>
  <body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Список товаров</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Главная</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/api/cart">Корзина</a>
                  </li>
                </ul>
                <form class="d-flex justify-content-end">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" v-model="search">
                  <button class="btn btn-outline-success" type="submit" v-on:click="search_brick()">Search</button>
                </form>
              </div>
            </div>
          </nav>
          <div class="container mt-5">
            <h2>Сортировка</h2>
            <select class="form-select " v-model="sort_material" aria-label="Default select example">
                <option value="none">Показать все</option>
                <option value="ceramic">Керамический </option>
                <option value="silicate">Силикатный </option>
                <option value="clinker">Клинкерный </option>
                <option value="fireclay" >Шамотный </option>
                <option value="hyper-pressed">Гиперпрессованный </option>
            </select>
            <button type="submit" class="btn btn-outline-primary" v-on:click="sort_brick()" >Подтвердить</button>
          </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col mb-3" v-for="item in items" :key="item.id">
                    <div class="card" style="width: 19rem;">
                        <img v-bind:src="item.img" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{item.title}}</h5>
                            <h6 class="card-text">Производитель: {{item.manufacturer}}</h6>
                            <h6 class="card-text">Материал: {{item.material}}</h6>
                            <p class="card-text">{{item.info}}</p>
                            <a href="#" class="btn btn-success">{{item.price}} руб.</a>
                        </div>                
                    </div>
                </div>
            </div>


            
        </div>
    </div>

    <!--Подключаем axios для выполнения запросов к api -->




</body>
    
</template>

<script>

export default {
    data(){
        return{
            id: '',
            title: '',
            manufacturer: '',
            info: '',
            material: '',
            price: '',
            is_hollow: 0,
            items: [],
            search: '',
            sort_material: 'Сортировка по материалу'
        }
    },

    mounted(){
        this.$axios.get('http://127.0.0.1:8000/api/brick/all')
        .then(req => {   
            this.items = req.data ;                    
            console.log(req.data);        
        });
    },

    methods: {
        loadBrickList(){
            this.$axios.get('http://127.0.0.1:8000/api/brick/all')
            .then(req => {   
                this.items = req.data ;                    
                console.log(req.data);
            })
        },

        sort_brick(){
            if(this.sort_material == 'none'){
                this.loadBrickList();
            } else {
                this.$axios.get('http://127.0.0.1:8000/api/brick/sort/' + this.sort_material, {})
                .then(req => {   
                    this.items = req.data ;                    
                    console.log(req.data);
                })
            }
            
        },
        search_brick(){
            if(this.search == ''){
                this.loadBrickList();
            } else {
                this.$axios.get('http://127.0.0.1:8000/api/brick/search/' + this.search, {})
                .then(req => {   
                    this.items = req.data ;                    
                    console.log(req.data);
                })
            }
        },
    },

}      
</script>

<style>
.container {
  margin: 0 auto;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.title {
  font-family:
    'Quicksand',
    'Source Sans Pro',
    -apple-system,
    BlinkMacSystemFont,
    'Segoe UI',
    Roboto,
    'Helvetica Neue',
    Arial,
    sans-serif;
  display: block;
  font-weight: 300;
  font-size: 100px;
  color: #35495e;
  letter-spacing: 1px;
}

.subtitle {
  font-weight: 300;
  font-size: 42px;
  color: #526488;
  word-spacing: 5px;
  padding-bottom: 15px;
}

.links {
  padding-top: 15px;
}
</style>
