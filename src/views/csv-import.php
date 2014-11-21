<!--meta title="IUTbook | Importer promo .csv" css="style/csv.css" js="script/upload.js"-->
    <div id="file">
        <fieldset id="add" class="button">
            <label>Sélectionnez un fichier .CSV</label> <input type="file" id="fileinput" name="file"> <img src="style/images/loader.gif" alt="chargement...">
        </fieldset>
    </div>

    <form action="" onsubmit="" method="post" enctype="multipart/form-data" id="csv">
        <select name="promo">
            <option value="" disabled selected style="display:none;">
                Promo
            </option><?php for($y=date("Y")+1; $y>=1967; $y--) echo '<option value="'.$y.'">'.$y.' - '.($y+2).'</option>';?>
        </select>

        <fieldset id="table"></fieldset><input type="submit" value="Enregistrer">
    </form><script type="text/javascript">
/*var multi_selector = new MultiSelector( document.getElementById( 'files_list' ), -1, '');
    multi_selector.addElement( document.getElementById( 'fileinput' ) );*/

    new FileTransfert(document.getElementById('fileinput'), 'csv', 'data/csv', '', function (resp) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'getCSV.php?file='+encodeURI(resp.name)+'&nbLines=1', true);

    xhr.onload = function() {
        if(this.readyState  == 4)
            if (this.status == 200) {
                var resp = JSON.parse(this.response);
                document.getElementById('table').appendChild(csvArrayToTable(resp));
                document.forms[0].style.opacity=1;
                console.log('responseTextARRAYCSV: '+this.responseText);
            }
    };
    xhr.send(null);
    });
    </script>