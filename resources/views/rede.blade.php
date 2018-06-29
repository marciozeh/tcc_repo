<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Máquinas na Rede</title>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <style>
            #sortable1, #sortable2 {
                border: 1px solid #eee;
                width: 142px;
                min-height: 20px;
                list-style-type: none;
                margin: 0;
                padding: 5px 0 0 0;
                float: left;
                margin-right: 10px;
            }
            #sortable1 li, #sortable2 li {
                margin: 0 5px 5px 5px;
                padding: 5px;
                font-size: 0.6em;
                width: 120px;
            }
        </style>
        {{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
        {{--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}

        {{--<script>--}}
            {{--$( function() {--}}
                {{--$( "#sortable1, #sortable2" ).sortable({--}}
                    {{--connectWith: ".connectedSortable"--}}
                {{--}).disableSelection();--}}
            {{--} );--}}
        {{--</script>--}}
        {{--<script>--}}
            {{--$(function(){--}}
                {{--$("#sortable1, #sortable2").droppable({ drop: Drop });--}}
                {{--function Drop(event, ui) {--}}
                        {{--//retorna a coluna onde dropou--}}
                    {{--var coluna = $(this).index();--}}
                    {{----}}
                    {{--console.log(coluna);--}}
                {{--}--}}
            {{--});--}}
        {{--</script>--}}

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script>
            $( function() {
                $( "#sortable1, #sortable2" ).sortable({

                });
            });
        </script>
    </head>

    <body>
       
        <main>



            <ul id="sortable1" class="connectedSortable">
                <label>Sem Permissão</label>
            <?php
            for($i = 0; $i  < count($list); $i++){
                if($list[$i]['permissions'] == '0'){
                ?>
                <li class="ui-state-default">{{'IP: ' . $list[$i]['ip']  ."\n" . 'MAC: ' . $list[$i]['mac'] . "\n" . $list[$i]['permissions']}}</li>
                <?php
                }}
                ?>
            </ul>

            <ul id="sortable2" class="connectedSortable">
                <lh>Com Permissão</lh>
                <?php
                for($i = 0; $i  < count($list); $i++){
                if($list[$i]['permissions'] == '1'){
                ?>
                <li class="ui-state-highlight">{{'IP: ' . $list[$i]['ip']  ."\n" . 'MAC: ' . $list[$i]['mac'] . "\n" . $list[$i]['permissions']}}</li>
                <?php
                }}
                ?>
            </ul>
            <form id="formConfiguracao"  action="{{route('web.send')}}" method="post">
                {{csrf_field()}}
                <input type="submit" name="name" value="Enviar" >
            </form>
        </main>       
    </body>
</html>