<script>

    $(function(){

       function define_alterar_remover(){ 
       
        $(".alterar").click(function(){

            i = $(this).val();
            
            $.get("seleciona_instrumento.php?id="+i,function(r){
                a = r[0]; 
                console.log(r);                       
                $("input[name='instrumento']").val(a.nome);
                $("input[name='id_instrumento']").val(a.id_instrumento);
                $("select[name='cod_modelo']").val(a.cod_modelo);
                $("select[name='cod_cor']").val(a.cod_cor);
            });
        });

        $(".remover").click(function(){
         
           i = $(this).val();
           c = "nome";
           t = "instrumento";
           p = {tabela: t, id:i, coluna:c}
           
           $.post("remover.php",p,function(r){
               
            if(r=='1'){                
                $("#msg").html("Instrumento removido com sucesso.");
                $("button[value='"+ i +"']").closest("tr").remove();
            }
           });
       }); 

       }

       define_alterar_remover();

       $(".salvar").click(function(){ 
           p = {
                instrumento:$("input[name='instrumento']").val(),
                id_instrumento:$("input[name='id_instrumento']").val(),
                cod_modelo:$("select[name='cod_modelo']").val(),
                cod_cor:$("select[name='cod_cor']").val()
           };        
            
           $.post("atualizar_instrumento.php",p,function(r){
               
            if(r=='1'){
                $("#msg").html("Instrumento alterado com sucesso.");
                $(".close").click();
                atualizar_tabela();                
            }else{
                $("#msg").html("Falha ao atualizar instrumento.");
                
            }
           });
       }); 

       function atualizar_tabela(){           
        $.get("seleciona_instrumento.php",function(r){
            t = "";
            console.log(r);
            $.each(r,function(i,v){                 
                t += "<tr>";
                t +=    "<td>"+v.instrumento+"</td>";
                t +=    "<td>"+v.nome_modelo+"</td>";
                t +=    "<td>"+v.nome_cor+"</td>";
                t +=    "<td>";
                t +=        "<button class='btn btn-warning alterar' value='"+v.id_instrumento+"' data-toggle='modal' data-target='#modal'>Alterar</button>";
                t +=        " <button class='btn btn-danger remover' value='"+v.id_instrumento+"'>Remover</button>";
                t +=    "</td>";
                t += "</tr>";
            });            
            $("#tbody_instrumento").html(t);
            define_alterar_remover();
        });
        }

    });

</script>




