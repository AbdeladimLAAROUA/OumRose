$(function () {
    var obj={'methode':'getCustomerCoulumns'};
    var selectColumn='';
    var table='';
    var query='';
    var maxTd=false;
    var names={};
    //le numéro du filer
    // a utiliser comme id unique
    var index=1;
    var operands = getOperands();

    $.ajax({
        url: "./lib/util.php",
        dataType: "json",
        type: "POST",
        data: obj,
        success: function (data, textStatus, jqXHR) {
            names = data['result']
            //selectColumn = getDropDownList('column', 'column', names);
            addRow();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });

    $('.addFilterBtn').on('click',function () {
        addRow();
    });
    $('.searchBtn').on('click',function () {
        var operands=[];
        var columns=[];
        var data=[];
        for (i = 1; i < index; i++) {
            var row  = $('#row_' + i);

            operand = row.find($('select[name="operands"] option:selected'));
            column = row.find($('select[name="columns"] option:selected'));

            value= row.find($('input[name="value"]'));
            maxRow= row.find($('input[name="max"]'));
            var maxValue='';
            if(maxRow){
                maxValue=maxRow.val();
                maxValue= maxValue===''? value.val():maxValue;
            }

            operands.push(operand.text());
            columns.push(column.text());
            var between = {'value': value.val(), 'max': maxValue};
            data.push(between);
        }
        query = queryBuilder(operands, columns,data);
        console.log(query);
        table.ajax.url("./lib/server_processingSearch.php?query=" + query + "&status=" + 1).load();
        table.ajax.reload();

    });
    $.fn.dataTableExt.sErrMode = 'none';
    table = $('#table_clients').DataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "./lib/server_processingSearch.php?status=" + 1,
        "columns": [
            {
                data: "0",
                render: function (data, type, row) {
                    return data;
                }
            },
            {data: "1"},
            {data: "2"},
            {data: "3"},
            {data: "4"},
            {data: "5"},
            {data: "6"},
            {data: "7"},
            {data: "8"},
            {
                data: "0",
                render: function (data, type, row) {
                    var ret = '<button class="btn btn-default btn-xs action" data-type="view" data-id="' + data + '" data-toggle="modal" data-target="#view" ><span class="glyphicon glyphicon-eye-open"></span></button>' +
                        '<button class="btn btn-primary btn-xs action" data-type="edit" data-id="' + data + '" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>' +
                        '<button class="btn btn-danger btn-xs action" data-type="delete" data-id="' + data + '" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>';
                    return ret;
                }
            }
        ],
        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {

            if (aData[9] == "blocked") {
                $('td', nRow).css('background-color', 'red');
                $('td', nRow).css('color', 'white');
            }
            else if (aData[8].substring(0, 4) == "BOX1") {
                $('td', nRow).css('background-color', '#ec7f8c');
                $('td', nRow).css('color', 'white');
            }
            else if (aData[8].substring(0, 4) == "BOX2") {
                $('td', nRow).css('background-color', '#6fc7c2');
                $('td', nRow).css('color', 'white');
            }
            else if (aData[8].substring(0, 4) == "BOX3") {
                $('td', nRow).css('background-color', '#8e6cac');
                $('td', nRow).css('color', 'white');
            }
        }
    })

    function getDropDownList(name, id, optionList) {
        var combo = "<select name='columns' data-index='"+index+"'>";

        $.each(optionList, function (i, el) {
            combo+="<option value='"+i+"'>" + el['COLUMN_NAME'] + "</option>";
        });
        combo += "</select>";
        return combo;
    }

    function getOperands() {
        var combo = "<select name='operands' data-index='" + index + "'>";

        combo += "<option value='0'>=</option>";
        combo += "<option value='1'>\></option>";
        combo += "<option value='2'>\>=</option>";
        combo += "<option value='3'>\<</option>";
        combo += "<option value='4'>\<=</option>";
        combo += "<option value='5'>LIKE</option>";
        combo += "<option value='6'>NOT LIKE</option>";
        combo += "<option value='7'>BETWEEN</option>";
        combo += "<option value='8'>NOT BETWEEN</option>";

        combo += "</select>";




        return combo;
    }

    function addRow(){

        var newRow = '<tr id="row_'+index+'">' +
            '<td >' + getDropDownList('column', 'column', names) + '</td>' +
            '<td >' + getOperands() + '</td>' +
            '<td> <input type="text" name="value" data-index="'+index+'"/> </td>' +
            +'</td>' +
            '</tr>';
        $("#searchParams tbody").append(newRow);


        $("select[name='operands'][data-index='"+index+"']").on('change', function () {

            operand = $(this).find(":selected").text();
            var l_index = $(this).data("index");
            console.log(l_index);
            if(operand === 'BETWEEN' || operand === 'NOT BETWEEN'){
                var row = $(this).closest("tr");
                var td = '<td><input type="text" name="max" data-index="'+ l_index+'"</td>';
                row.append(td);
                if(!maxTd){
                    $('#firstRow').append('<th>Valeur max</th>');
                    maxTd=true;
                }
                $(this).off('change');

            }

           var column = $("select[name='columns'][data-index='" + l_index + "'] option:selected").text();

            if (column === 'creationDate' || column === 'updateDate') {
                $('input[name="max"][data-index=' + l_index + ']').datepicker({
                    autoclose: true,
                    forceParse: false,
                    format: 'yyyy-mm-dd'
                });

            } else {
                $('input[data-index=' + l_index + ']').datepicker("remove");
            }


        });

        $("select[name='columns']").on('change', function () {

            column = $(this).find(":selected").text();
            var l_index = $(this).data("index");
            if (column === 'creationDate' || column === 'updateDate') {
                $('input[data-index='+ l_index+']').datepicker({
                    autoclose: true,
                    forceParse: false,
                    format: 'yyyy-mm-dd'
                });

            } else {
                $('input[data-index=' + l_index + ']').datepicker("remove");
            }

        });

        index++;
    }

    function queryBuilder(operands, columns, data){
        console.log(data);

        var select = '';
        $.each(columns, function (i, el) {
            var fDada = data[i]['value'];
            if(operands[i]==='LIKE' || operands[i] === 'NOT LIKE' && (columns[i] === 'creationDate')){
             /*   var parts = data[i]['value'].split("-");
                fDada='%'+ new Date(parts[2], parts[1] - 1, parts[0])+'%';*/
                fDada = '**' + data[i]['value'] + '**';
            }else if(operands[i] === 'LIKE' || operands[i] === 'NOT LIKE'){
                fDada = '**' + data[i]['value'] + '**';
            }else if(operands[i] === 'BETWEEN' || operands[i] === 'NOT BETWEEN'){
                fDada=data[i]['value']+'" and "'+ data[i]['max']+'';
            }

            select+=el+' '+operands[i]+' "'+ fDada+'" and ';
        });
        select=select.slice(0,-5);
        return select;
    }



    /*EVENTS*/



});