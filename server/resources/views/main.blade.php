<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body{
            background-image: url(http://www.nellymikhaylova.ru/wp-content/uploads/2016/01/kirpichnye-steny-5-1024x683.jpg)
        }
    </style>
</head>
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
                  <li class="nav-item">
                    <a class="nav-link" href="/api/admin">Админ</a>
                  </li>
                </ul>
                <div class="d-flex justify-content-end">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" v-model="search">
                  <button class="btn btn-outline-success" v-on:click="search_brick()">Search</button>
                </div>
              </div>
            </div>
          </nav>
          {{-- <div class="card"> --}}
          <div class="container mt-5">
            <h2 style="color: white;">Сортировка</h2>
            <select class="form-select " v-model="sort_material" aria-label="Default select example">
                <option value="none">Показать все</option>
                <option value="ceramic">Керамический </option>
                <option value="silicate">Силикатный </option>
                <option value="clinker">Клинкерный </option>
                <option value="fireclay" >Шамотный </option>
                <option value="hyper-pressed">Гиперпрессованный </option>
            </select>
            <button type="submit" class="btn btn-primary" v-on:click="sort_brick()">Подтвердить</button>
          </div>
        {{-- </div> --}}
        <div class="container mt-5">
            {{-- <h1>Список товаров</h1> --}}
            <div class="row">
            @verbatim
                <div class="col mb-3" v-for="item in items">
                    <div class="card" style="width: 19rem;">
                        <img v-bind:src="item.img" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{item.title}}</h5>
                            <h6 class="card-text">Производитель: {{item.manufacturer}}</h6>
                            <h6 class="card-text">Материал: {{item.material}}</h6>
                            <p class="card-text">{{item.info}}</p>
                            <a class="btn btn-success">{{item.price}} руб.</a>
                        </div>                
                    </div>
                </div>
            @endverbatim
            </div>


            
        </div>
    </div>

    <!--Подключаем axios для выполнения запросов к api -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>

    <!--Подключаем Vue.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>

    <script>
        let vm = new Vue({
            el: '#app',
            data: {
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
            },
            methods: {
                loadBrickList(){
                    axios.get('api/brick/all')
                    .then(req => {   
                        this.items = req.data ;                    
                        console.log(req.data);
                    })
                },

                sort_brick(){
                    if(this.sort_material == 'none'){
                        this.loadBrickList();
                    } else {
                        axios.get('api/brick/sort/' + this.sort_material, {})
                        .then(req => {   
                            this.items = req.data ;                    
                            console.log(req.data);
                        })
                    }
                    
                },
                search_brick(){
                    console.log(this.search);
                    if(this.search == ''){
                        this.loadBrickList();
                    } else {
                        axios.get('api/brick/search/' + this.search, {})
                        .then(req => {   
                            this.items = req.data ;                    
                            console.log(req.data);
                        })
                    }
                },
            
            },
            mounted(){
                this.loadBrickList();
            }
        });
    </script>
</body>
</html>