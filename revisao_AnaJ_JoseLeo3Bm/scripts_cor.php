<script>

    $(function(){

       function define_alterar_remover(){ 
       
        $(".alterar").click(function(){

            i = $(this).val();
            
            $.get("seleciona_cor.php?id="+i,function(r){
                a = r[0];
                console.log(r);
                $("input[name='nome']").val(a.nome);                               
                $("input[name='id_cor']").val(a.id_cor);

            });
        });

        $(".remover").click(function(){
         
           i = $(this).val();
           c = "cor.nome";
           t = "cor";
           p = {tabela: t, id:i, coluna:c}
           console.log(p);
           $.post("remover.php",p,function(r){
               
            if(r=='1'){                
                $("#msg").html("Cor removida com sucesso.");
                $("button[value='"+ i +"']").closest("tr").remove();
            }
           });
       }); 

       }

       define_alterar_remover();

       $(".salvar").click(function(){ 
           p = {
                cor:$("input[name='nome']").val(),
                id_cor:$("input[name='id_cor']").val(),
           };        
           
           $.post("atualizar_cor.php",p,function(r){
            if(r=='1'){
                $("#msg").html("Cor alterada com sucesso.");
                $(".close").click();
                atualizar_tabela();                
            }else{
                $("#msg").html("Falha ao atualizar cor.");
            }
           });
       }); 

       function atualizar_tabela(){           
        $.get("seleciona_cor.php",function(r){
            t = "";
            $.each(r,function(i,a){                 
                t += "<tr>";
                t +=    "<td>"+a.nome+"</td>";
                t +=    "<td>";
                t +=        "<button class='btn btn-warning alterar' value='"+a.id_cor+"' data-toggle='modal' data-target='#modal'>Alterar</button>";
                t +=        " <button class='btn btn-danger remover' value='"+a.id_cor+"'>Remover</button>";
                t +=    "</td>";
                t += "</tr>";
            });            
            $("#tbody_cor").html(t);
            define_alterar_remover();
        });
        }

    });

</script>




