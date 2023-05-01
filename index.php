<html lang="es">
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <title>CRUD - Clientes-PHP</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
    </head>
<body>
    <h1>CRUD-Clientes</h1>
    <hr/>
    
    <div class="mb-5">
        <table class="table table-dark" id="datos" style="border-collapse: collapse; width: 50%; border:1px solid black;">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Accion</th>
                </tr>
            </thead>
        
        <tbody>
            <tr>
                <td >
                    
                </td>
                <td class="table-active">
                  
                </td>
                <td>
                    
                </td>
                <td>
                   
                </td>
            </tr>
        </tbody>
        </table>
    </div>


    <hr/>
    <div class='position-absolute start-0 mt-5'>  
      <form>
        <div class='container'>

        
        <div class="mb-3 ">
          <label  class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre"
          
          />
        </div>
        
        <div class="mb-3">
          <label  class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
          
          />
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        
        <input type="text" hidden id="codigoCliente"/>
        <button class='btn btn-primary' type='button' id="guardar" onclick="agregarCliente()">Agregar</button>
        
        </div>
        <h1 id="nombreP"></h1>
        
        </form>
      </div>

</body>
<script type="text/javascript">

    /*$.document.ready(function(){
        $.ajax({
            type:'post',
            url:"crud.php",
            success:function(res){
                var info=JSON.parse(res);
                console.log("CLIENTES",info);
            }
        });
    });*/
    $.ajax({
        type:'get',
        url:"https://localhost:7212/api/cliente/GetAllClientes",
        success:function(res){
               // var info=JSON.parse(res);
         
            for(let i=0;i<=res.length;i++){
                   
                let datos=document.getElementById('datos').insertRow(0);
                let col1=datos.insertCell(0);
                let col2=datos.insertCell(1);
                let col3=datos.insertCell(2);
                let col4=datos.insertCell(3);

                let botonEliminar=document.createElement("BUTTON");
                var texto=document.createTextNode("Eliminar");
                botonEliminar.appendChild(texto);
                botonEliminar.classList.add("btn","btn-warning");
                botonEliminar.setAttribute("id","eliminar"+i);
                let botonEditar=document.createElement("BUTTON");
                var textoAgregar=document.createTextNode("Editar");
                botonEditar.appendChild(textoAgregar);
                botonEditar.classList.add("btn","btn-success");
                botonEditar.setAttribute("id","editar");
           //     botonEditar.addEventListener("click",agregarCliente(JSON.stringify(res[i])));
                //$("#agregar").on("click",agregarCliente(res[i]));
                botonEliminar.addEventListener("click",function(){
                    eliminarCliente(res[i].id);
                });   
                botonEditar.addEventListener("click",function(){
                    editarCliente(res[i]);
                })
                col1.innerHTML=res[i].id;
                col2.innerHTML=res[i].nombre;
                col3.innerHTML=res[i].email;
                col4.appendChild(botonEliminar);
                col4.appendChild(botonEditar);

                    
                    
                    
                }
                
            }
        });
    
    function editarCliente(cliente){
        console.log("EDITAR:",cliente);
        document.getElementById('nombre').value=cliente.nombre;
        document.getElementById('exampleInputEmail1').value=cliente.email;
        document.getElementById('guardar').textContent='Guardar Cambios';
        document.getElementById('codigoCliente').value=cliente.id;

    }   

    function eliminarCliente(id){
        //alert(id);
        $.ajax({
            type:"delete",
            url:`https://localhost:7212/api/cliente/deleteCliente/${id}`,
            success:function(res){
                console.log("Cliente eliminado con éxito");
            }
        })
    }
    function agregarCliente(){
      let nombrep=document.getElementById('nombre').value;
      let emailp=document.getElementById('exampleInputEmail1').value;
       
      
        let cliente={
            nombre:nombrep,
            email:emailp
        }
       // console.log("ENVIO",cliente);
       if( document.getElementById('guardar').textContent==='Guardar Cambios'){
            id=document.getElementById('codigoCliente').value;
            
            $.ajax({
                type:"put",
                url:`https://localhost:7212/api/cliente/updateCliente/${id}`,
                contentType:"application/json",
                async:true,
                data:JSON.stringify(cliente),
                success:function(res){
                    console.log("Actualizacion exitosa");
                }
            });
        }
        else{
       $.ajax({
            type:"post",
            url:"https://localhost:7212/api/cliente/postCliente",
            contentType:"application/json",
            async:true,
            data:JSON.stringify(cliente),
           success:function(res){
            console.log("Guardado exitoso");
           },
           error:function(error,status){
            console.log("ERROR EN EL POST:,",error,status);
           } 
        });
    }
       
    }

</script>
</html>
