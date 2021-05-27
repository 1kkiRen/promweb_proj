<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body{
            background-image: url(http://www.nellymikhaylova.ru/wp-content/uploads/2016/01/kirpichnye-steny-5-1024x683.jpg);
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Редактирование кирпичей</a>
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
                
              </div>
            </div>
          </nav>
        <div class="container mt-5">

            <div class="row">
                    <div class="card" style="width: 50rem; margin-left: auto; margin-right:auto; padding: 15px 20px;">
                         
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">img</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" v-model="img">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Название</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" v-model="title">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Производитель</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" v-model="manufacturer">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Материал</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" v-model="material">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Инфо</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" v-model="info">
                        </div>   
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Цена</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" v-model="price">
                        </div>
                        <button type="button" class="btn btn-outline-success" v-on:click="add_brick()">
                            Добавить
                        </button>       
                    </div>
                    
                </div>
            
                <div class="row">
                    <div class="card" style="width: 50rem; margin-left: auto; margin-right:auto; padding: 15px 20px;">
                         
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">id</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" v-model="id">
                        </div>
                        
                        <button type="button" class="btn btn-outline-success" v-on:click="delete_brick()">
                            Удалить
                        </button>       
                    </div>
                    
                </div>

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
                img: '',
                title: '',
                manufacturer: '',
                info: '',
                material: '',
                price: '',
                is_hollow: 0,

            },
            methods: {

                add_brick(){
                    console.log(this.img, this.title, this.manufacturer, this.material, this.info, this.price, this.is_hollow);
                    axios.post('brick/add', {
                        "img": this.img,
                        "title": this.title,
                        "manufacturer": this.manufacturer,
                        "info": this.info,
                        "material": this.material,
                        "price": this.price,
                        "is_hollow": 1,
                        
                    })
                    .then((response) => {
                        console.log(response);
                    });

                },

                delete_brick(){
                    console.log(this.id);
                    axios.get('brick/delete/' + this.id, {})
                    .then((response) => {
                        console.log(response);
                    });

                },
            
            },
        });
    </script>
</body>
</html>