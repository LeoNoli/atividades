<script>

    $(function(){

       function define_alterar_remover(){ 
       
        $(".alterar").click(function(){

            i = $(this).val();
            
            $.get("seleciona_cadastro.php?id="+i,function(r){
                a = r[0];
                console.log(r);
                $("input[name='nome']").val(a.nome);
                $("input[name='id_usuario']").val(a.id_usuario);                               
                $("input[name='email_cadastro']").val(a.email);                               

            });
        });

        $(".remover").click(function(){
         
         i = $(this).val();
         c = "id_usuario";
         t = "usuario";
         p = {tabela: t, id:i, coluna:c}
         console.log(p);
         $.post("remover.php",p,function(r){
             
          if(r=='1'){                
              $("#msg").html("Usuário removido com sucesso.");
              $("button[value='"+ i +"']").closest("tr").remove();
          }
         });
     }); 

       }

       define_alterar_remover();

       $(".salvar").click(function(){ 
           var senha = $("input[name='senha_cadastro']").val();
           if(senha!=""){
               senha = $.md5(senha);
           }
           p = {
                nome:$("input[name='nome']").val(),
                id_usuario:$("input[name='id_usuario']").val(),
                email_cadastro:$("input[name='email_cadastro']").val(),
                senha_cadastro: senha
           };        
           $.post("atualizar_cadastro.php",p,function(r){
               console.log(r);
            if(r=='1'){
                $("#msg").html("Cadastro alterado com sucesso.");
                $(".close").click();
                atualizar_tabela();                
            }else{
                $("#msg").html("Falha ao atualizar cadastro.");
            }
           });
       }); 

       function atualizar_tabela(){           
        $.get("seleciona_cadastro.php",function(r){
            t = "";
            console.log(r);
            $.each(r,function(i,a){                   
                t += "<tr>";
                t +=    "<td>"+a.nome+"</td>";
                t +=    "<td>"+a.email+"</td>";
                t +=    "<td>";
                t +=        "<button class='btn btn-warning alterar' value='"+a.id_usuario+"' data-toggle='modal' data-target='#modal'>Alterar</button>";
        <?php 
        if(isset($_SESSION["permissao"]) && $_SESSION["permissao"]=="1"){
            echo "t +=        \" <button class='btn btn-danger remover' value='\"+a.id_usuario+\"'>Remover</button>\";";
        }
        ?>
                t +=    "</td>";
                t += "</tr>";
            });            
            $("#tbody_cadastro").html(t);
            define_alterar_remover();
        });
        }

    });

</script>



