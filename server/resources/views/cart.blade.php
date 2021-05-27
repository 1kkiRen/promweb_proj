<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- Подключаем Bootstrap, чтобы не работать над дизайном проекта -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Корзина</a>
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
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
              </div>
            </div>
          </nav>
        <div class="container mt-5">
            <h1>Список товаров</h1>
            <div class="row">
            @verbatim
                <div class="col mb-3" v-for="item in items">
                    <div class="card" style="width: 19rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{item.title}}</h5>
                            <h6 class="card-text">Производитель: {{item.manufacturer}}</h6>
                            <p class="card-text">{{item.info}}</p>
                            <a href="#" class="btn btn-success">{{item.price}} руб.</a>
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
                items: []
            },
            methods: {
                loadBrickList(){
                    axios.get('api/brick/all')
                    .then(req => {   
                        this.items = req.data ;                    
                        console.log(req.data);
                    })
                },
            
            },
            mounted(){
                // Сразу после загрузки страницы подгружаем список книг и отображаем его
                this.loadBrickList();
            }
        });
    </script>
</body>
</html>