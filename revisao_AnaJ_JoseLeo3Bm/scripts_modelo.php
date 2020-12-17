<script>

    $(function(){

       function define_alterar_remover(){ 
       
        $(".alterar").click(function(){

            i = $(this).val();
            
            $.get("seleciona_modelo.php?id="+i,function(r){
                a = r[0];                               
                $("input[name='nome']").val(a.nome);
                $("input[name='id_modelo']").val(a.id_modelo);

            });
        });

        $(".remover").click(function(){
         
           i = $(this).val();
           c = "id_modelo";
           t = "modelo";
           p = {tabela: t, id:i, coluna:c}
           console.log(p);
           $.post("remover.php",p,function(r){
            console.log(r);
            if(r=='1'){                
                $("#msg").html("Modelo removido com sucesso.");
                $("button[value='"+ i +"']").closest("tr").remove();
            }
            else{
                $("#msg").html("Este modelo não pode ser removido. Já existe um instrumento cadastrado para ele.");
            }
           });
       }); 

       }

       define_alterar_remover();

       $(".salvar").click(function(){ 
           p = {
                modelo:$("input[name='nome']").val(),
                id_modelo:$("input[name='id_modelo']").val(),
           };        
           
           $.post("atualizar_modelo.php",p,function(r){
            if(r=='1'){
                $("#msg").html("Modelo alterado com sucesso.");
                $(".close").click();
                atualizar_tabela();                
            }else{
                $("#msg").html("Falha ao atualizar modelo.");
            }
           });
       }); 

       function atualizar_tabela(){           
        $.get("seleciona_modelo.php",function(r){
            t = "";
            $.each(r,function(i,a){                 
                t += "<tr>";
                t +=    "<td>"+a.nome+"</td>";
                t +=    "<td>";
                t +=        "<button class='btn btn-warning alterar' value='"+a.id_modelo+"' data-toggle='modal' data-target='#modal'>Alterar</button>";
                t +=        " <button class='btn btn-danger remover' value='"+a.id_modelo+"'>Remover</button>";
                t +=    "</td>";
                t += "</tr>";
            });            
            $("#tbody_modelo").html(t);
            define_alterar_remover();
        });
        }

    });

</script>





