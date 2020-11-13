<script>

    $(function(){
       $(".remover").click(function(){
           i = $(this).val();
           c = "cor.nome";
           t = "cor";
           p = {tabela: t, id:i, coluna:c}
           $.post("remover.php",p,function(r){
            if(r=='1'){                
                $("#msg").html("Cor removida com sucesso.");
                $("button[value='"+ i +"']").closest("tr").remove();
            }
           });
       }); 
    });

</script>