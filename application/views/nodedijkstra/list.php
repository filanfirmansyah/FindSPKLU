   
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/graphGenerator/css/style.css">
   
   <style>
	.hide {
		display:none !important;
	}
	
	label.new_panel_tab { 
		font-size: 20px; 
		border-radius: 5px 5px 0 0;
		 
	}
	label { 
		margin-bottom: 0px;  
	}
	
	div.button_wrapper {
		clear: both;
		text-align: left;
	}
	
	#block_left {
		width: 100% !important;
		margin: 0px !important; 
	}
	#map {
		height: 450px;
		width: 100% !important;
		
	}

	.x_content {
		padding: 0px !important;
	}

	#block_right {
		float: left;
		width: 40%;
		max-width: 600px;
	}
	div.select_panel {
		max-width: 600px !important;
		margin: 10px 0px 10px 20px;
		padding: 20px;
		border-radius: 0px;
		background-color: #F2F2F2;
		font-size: 15px;
		line-height: 30px;
		color: #222222;
	}
	
	div.new_panel {
		display: none;
		clear: both;
		padding: 20px;
		background-color: #636262;
		color: #F2F2F2;
		font-size: 15px;
		line-height: 180%;
	}

	input.short {
		color: #222222; 
		background-color: #F2F2F2;
		width: 150px;
		margin: 0 0px 0 0;
		font-size: 15px;
 	}
	div.new_panel_right {
		width: 100%;
		float: left;
	}
	
	.main_container{
		background: #2A3F54;
	}

	 
   </style>
   
   <div class="page-title">
            <div class="title_left">
              <h4><?php echo $title ?>  </h4>
            </div>
            <div class="title_right"> 
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-xs-12 col-lg-12">
              <div class="x_panel" style="margin-top:5px;">
                
                <div class="x_content">
                
				* Tambah titik : klik pada peta. Edit titik : klik dan geser titik. Hapus titik : double klik pada titik. <br/>
				* Tambah jalur : klik kanan pada titik1, klik kanan pada titik2. Hapus jalur : double klik pada jalur/garis.
				
				
				
	<div id="block_left">
	
      <div id="map"></div> 
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDu2vT0kp4UjmRmUwpq0SOONk9RCbG16ds&callback=InitMap" async defer></script>
	  
	  
      
      <div class="under_map hide">
        <input id="autoElevation" type="checkbox" name="autoMap" value="1" onchange="ChangeAutoElevation()"> Automatically change node values according to the elevation<br>
        <input id="autoDistance" type="checkbox" name="autoMap" value="2" onchange="ChangeAutoDistance()"> Automatically change edge values according to the distance<br>
      </div>

    
      <div class="export_panel hide">
        <h2>Export Option</h2>
        <div class="exportOptions">
          <input id="includeNodeValueCheck" type="checkbox" name="autoMap" value="1" onchange="ChangeIncludeNodeValue()" checked>
          Include value of node<br>
        </div>
        <div class="exportOptions">
          <input id="includeNodeInfoCheck" type="checkbox" name="autoMap" value="2" onchange="ChangeIncludeNodeInfo()" checked>
          Include Info. of node<br>
        </div>
        <div class="exportOptions">
          <input id="includeEdgeValueCheck" type="checkbox" name="autoMap" value="1" onchange="ChangeIncludeEdgeValue()" checked>
          Include value of edge<br>
        </div>
        <div class="exportOptions">
          <input id="includeEdgeInfoCheck" type="checkbox" name="autoMap" value="2" onchange="ChangeIncludeEdgeInfo()" checked>
          Include Info. of edge<br>
        </div>
        <div class="button_wrapper">
          <button type="button" name="exportBtn" class="new_panel_create_button" onclick="ExportFile()">
             Export File
          </button>
        </div>
      </div>

      <div class="export_panel hide">
        <h2>Edit Node</h2>
        <div class="button_wrapper">
          <input id="file_upload" type="file" name="importFile" class="hidden" onchange="ImportFile(this)">
          <label class="import_file_button" for="file_upload">
            Import File
          </label>
        </div>
        <div class="button_wrapper">
          <button type="button" name="deleteAllBtn" class="all_delete_button" onclick="DeleteAllNodes()">
             Delete all nodes
          </button>
        </div>
      </div>
    </div>

    <div id="block_right">
	
	  <div id="new_panel_area">

        <input id="node_tab" type="radio" name="new_panel_tab" class="hidden" >
        <label class="new_panel_tab hide" for="node_tab">Titik</label>
		
        <input id="edge_tab" type="radio" name="new_panel_tab" class="hidden" checked>
        <label class="new_panel_tab hide" for="edge_tab">Jalur</label>

        <div class="new_panel" id="node_content">
          <div class="new_panel_left hide">
            Latitude
          </div>
          <div class="new_panel_right hide">
            <input type="text" id="latInput" name="Latitude" class="short">
          </div>
          <div class="new_panel_left hide">
            Longitude
          </div>
          <div class="new_panel_right hide">
            <input type="text" id="lngInput" name="Longitude" class="short">
            <button type="button" name="autoInputlatlngBtn" class="new_panel_input_button" onclick="SetLatLng()">Input center of the map</button>
          </div>
          <div class="new_panel_left hide">
            Value
          </div>
          <div class="new_panel_right hide">
		    <input type="hidden" id="alamat" name="alamat" class="short">
            <input type="text" id="elevInput" name="Elevation" class="short">
            <button type="button" name="autoInputElevBtn" class="new_panel_input_button" onclick="SetElev()">Input elevation</button>
          </div>
          <div class="new_panel_left hide">
            Info.
          </div>
          <div class="new_panel_right hide">
            <input type="text" id="nodeInfoInput" name="Info" class="short">
          </div>
          <div class="button_wrapper hide">
            <button type="button" name="createNodeBtn" class="btn btn-lg btn-success" style="width:100%;" onclick="AddNode()">
              Buat Titik
            </button>
          </div>
        </div>

        <div class="new_panel hide" id="edge_content">
          <div class="new_panel_left">
            Titik 1
          </div>
          <div class="new_panel_right">
            <input type="text" id="node1Input" name="Node1" class="short">
            <button type="button" name="autoInputNode1Btn" class="btn btn-success" onclick="SetNode1()">Masukkan Titik</button>
          </div>
          <div class="new_panel_left">
            Titik 2
          </div>
          <div class="new_panel_right">
            <input type="text" id="node2Input" name="Node2" class="short">
            <button type="button" name="autoInputNode2Btn" class="btn btn-success" onclick="SetNode2()">Masukkan Titik</button>
          </div>
          <div class="new_panel_left">
            Jarak
          </div>
          <div class="new_panel_right">
            <input type="text" id="distanceInput" name="Node2" class="short">
            <button type="button" name="autoInputDistanceBtn" class="btn btn-success hide" onclick="SetDistance()">Input distance</button>
          </div>
          <div class="new_panel_left hide">
            Info.
          </div>
          <div class="new_panel_right hide">
            <input type="text" id="edgeInfoInput" name="Info" class="short">
          </div>
		  
          <div class="button_wrapper">
		  <br/> 
            <button type="button" name="createEdgeBtn" class="btn btn-lg btn-success"  style="width:100%;" onclick="AddEdge()">
              Buat Jalur
            </button>
          </div>
        </div>
      </div>


      <div class="select_panel hide">
		<div class=""> 
        <h4>TITIK TERPILIH</h4>
        <div class="select_panel_left">ID:</div>
        <div class="select_panel_right" id="select_id">-</div>
        <div class="select_panel_left">Latitude:</div>
        <div class="select_panel_right">
          <input type="text" id="select_lat" class="select_panel_right">
        </div>
        <div class="select_panel_left">Longitude:</div>
        <div class="select_panel_right">
          <input type="text" div id="select_lng" class="select_panel_right">
        </div>
        <div class="select_panel_left hide">Value:</div>
        <div class="select_panel_right hide">
          <input type="text" id="select_val" class="select_panel_right">
        </div>
        <div class="select_panel_left hide">Info:</div>
        <div class="select_panel_both hide">
          <textarea id="select_info" class="select_panel_both" value=""></textarea>
        </div>
		<div class="clearfix"></div><br/>
        <button type="button" name="deleteNodeBtn" class="btn btn-warning" onclick="UpdateNode()">
           Update Titik
        </button>
        <button type="button" name="deleteNodeBtn" class="btn btn-danger" onclick="DeleteNode()">
           Hapus Titik
        </button>
		</div>
		<br/>
        <div class="gray_line"></div>
		<br/>
        <h4>JALUR TERPILIH</h4>
        <div id="select_edges">
        </div>
      </div>
    </div>
	
	
	
	
	
	
	 
			  </div>
              </div>
            </div>
          </div>
 




	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDu2vT0kp4UjmRmUwpq0SOONk9RCbG16ds&callback=initMap&language=id&region=ID&style=feature:poi%7Celement:labels.icon%7Cvisibility:off"></script>
	 
	 

<script>
	
var map;
var elevationObj;
var node_list = new Array();
var edge_list = new Array();
var selectingNode = null;
var autoChangeElevation = true;
var autoChangeDistance = true;
var marker_icon;
var marker_icon_info;
var selected_marker_icon;
var selected_marker_icon_info;
var includeNodeValue = true;
var includeNodeInfo = true;
var includeEdgeValue = true;
var includeEdgeInfo = true;


var lineSymbol = {
  path: google.maps.SymbolPath.FORWARD_OPEN_ARROW
};




class Map_node{
  constructor(index, latitude, longitude, value, info, marker){
    this.index = index;
    this.latitude = latitude;
    this.longitude = longitude;
    this.value = value;
    this.info = info;
    this.marker = marker;
  }
}

class Map_edge{
  constructor(node_1, node_2, value, info, polyLine){
    this.node_1 = node_1;
    this.node_2 = node_2;
    this.value = value;
    this.info = info;
    this.polyLine = polyLine;
  }
}

/* center position is Tokyo Institute of Technology */
function InitMap() {

	
    var target = document.getElementById('map');
	var styles = {
        default: null,
        hide: [
          {
            featureType: 'poi',
            stylers: [{visibility: 'off'}]
          },
          {
            featureType: 'transit',
            elementType: 'labels.icon',
            stylers: [{visibility: 'off'}]
          }
        ]
      };

 
    map = new google.maps.Map(target, {
    center: {lat: -6.180676027191859, lng: 106.83277092924035},
    zoom: 12
    });
	
	map.setOptions({styles: styles['hide']});
	
	
	google.maps.event.addListener(map, 'click', function(event) {
			AddNode(event.latLng)  
	});
	
	
	 


    elevationObj = new google.maps.ElevationService();

    marker_icon = { 
		path: google.maps.SymbolPath.CIRCLE,
		scale: 4,
		fillColor: "#F00",
		fillOpacity: 1,
		strokeWeight: 1 
    }
    marker_icon_info = {
		path: google.maps.SymbolPath.CIRCLE,
		scale: 4,
		fillColor: "#CCC",
		fillOpacity: 1,
		strokeWeight: 1 
    }
    selected_marker_icon = {
		path: google.maps.SymbolPath.CIRCLE,
		scale: 6,
		fillColor: "#FBF802",
		fillOpacity: 1,
		strokeWeight: 1 
    }
    selected_marker_icon_info = {
		path: google.maps.SymbolPath.CIRCLE,
		scale: 6,
		fillColor: "#000",
		fillOpacity: 1,
		strokeWeight: 1 
    }
	
	
	siapkanData();
	
}

function ChangeAutoElevation(){
  if(document.getElementById("autoElevation").checked){
    autoChangeElevation = true;
  }
}

function ChangeAutoDistance(){
if(document.getElementById("autoDistance").checked){
    autoChangeDistance = true;
  }
}

function ChangeIncludeNodeValue(){
  if(document.getElementById("includeValueCheck").checked){
    includeNodeValue = true;
  }
}

function ChangeIncludeNodeInfo(){
if(document.getElementById("includeInfoCheck").checked){
    includeNodeInfo = true;
  }
}

function ChangeIncludeEdgeValue(){
  if(document.getElementById("includeValueCheck").checked){
    includeEdgeValue = true;
  }
}

function ChangeIncludeEdgeInfo(){
if(document.getElementById("includeInfoCheck").checked){
    includeEdgeInfo = true;
  }
}

function SetLatLng(){
  var latlng = map.getCenter();
  document.getElementById("latInput").value = String(latlng.lat());
  document.getElementById("lngInput").value = String(latlng.lng());
}

/* set elevation at the inputted latitude and longitude to the input field */
function SetElev(){
  var lat = parseFloat(document.getElementById("latInput").value);
  var lng = parseFloat(document.getElementById("lngInput").value);
  var latlng = new google.maps.LatLng(lat, lng);
  var request = {locations: new Array(latlng)};
  elevationObj.getElevationForLocations(request, function(response, status){
    if(status == google.maps.ElevationStatus.OK){
      document.getElementById("elevInput").value = String(response[0].elevation);
    }else{
      alert("Tidak dapat mengambil data elevation");
    }
  });
}

function AddNode(tempatklik){
	
  var latlng = tempatklik;
  document.getElementById("latInput").value = String(latlng.lat());
  document.getElementById("lngInput").value = String(latlng.lng());
 
  var lat = parseFloat(document.getElementById("latInput").value);
  var lng = parseFloat(document.getElementById("lngInput").value);
  var value = parseFloat(document.getElementById("elevInput").value);
  var info = String(document.getElementById("nodeInfoInput").value);

   

  if(isNaN(lat) || isNaN(lng)){
    alert("Error: Latitude dan Logitude tidak tepat.");
    return;
  }

  if(isNaN(value)){
    value = 0;
  }

  var newMarker = new google.maps.Marker({  // set marker to the google maps
    position: new google.maps.LatLng(lat, lng),
    animation: google.maps.Animation.DROP,
    icon: {
        path: google.maps.SymbolPath.CIRCLE,
        scale: 4,
        fillColor: "#F00",
        fillOpacity: 1,
        strokeWeight: 1
    },
    draggable: true,
    map: map
  });
  
	google.maps.event.addListener(newMarker, "dblclick", function (e) { 
        DeleteNode();
    });
			
  
  google.maps.event.addListener(newMarker,  'rightclick',  function(mouseEvent) { 
		 
		
		var id1 =  document.getElementById("node1Input").value;
		var id2 =  document.getElementById("node2Input").value;
 
		
		if(id1=='' && id2=='') { 
			SetNode1();
			alert('node1');
		} else if(id1!='' && id2=='') { 
			SetNode2();  
			alert('node2');
			
		} else if(id1!='' && id2!='') {    
			document.getElementById("node1Input").value='';
			document.getElementById("node2Input").value='';
			SetNode1();
			alert('node1');
		}
	 
  });
  

  SwitchSelectingNode(new Map_node(node_list.length, lat, lng, value, info, newMarker));
  node_list.push(selectingNode);

  var index = selectingNode.index;
  google.maps.event.addListener(newMarker, 'click', function(e) {
    SelectNode(index);
  });
  google.maps.event.addListener(newMarker, 'dragend', function(e) {
    MoveNode(index, e.latLng);
  });

  // reset input field
  document.getElementById("latInput").value = "";
  document.getElementById("lngInput").value = "";
  document.getElementById("elevInput").value = "";
  document.getElementById("nodeInfoInput").value = "";

  SelectDisplay();
  
   
  TambahNode(index, lat, lng);
  
}

function SwitchSelectingNode(newSelectingNode){
  // unselect now selecting marker
  if(selectingNode != null){
    if(selectingNode.info === ""){
      selectingNode.marker.setIcon(marker_icon);
    }else{
      selectingNode.marker.setIcon(marker_icon_info);
    }
  }

  selectingNode = newSelectingNode;

  if(selectingNode.info === ""){
    selectingNode.marker.setIcon(selected_marker_icon);
  }else{
    selectingNode.marker.setIcon(selected_marker_icon_info);
  }
}

function SetNode1(){
  document.getElementById("node1Input").value = String(selectingNode.index);
}

function SetNode2(){
  document.getElementById("node2Input").value = String(selectingNode.index);
  SetDistance();
  AddEdge();
}

/* set distance between node 1 and node 2 to the value input field */
function SetDistance(){
  var id_1 = parseInt(document.getElementById("node1Input").value);
  var id_2 = parseInt(document.getElementById("node2Input").value);
  
  
  var node_1 = node_list[id_1];
  var node_2 = node_list[id_2];
  var position_1 = new google.maps.LatLng(node_1.latitude, node_1.longitude);
  var position_2 = new google.maps.LatLng(node_2.latitude, node_2.longitude);
  var distance = google.maps.geometry.spherical.computeDistanceBetween(position_1, position_2);
		   
  document.getElementById("distanceInput").value = String(distance);
  
  
}

function AddEdge(){
  var id_1 = parseInt(document.getElementById("node1Input").value);
  var id_2 = parseInt(document.getElementById("node2Input").value);
  var value = parseFloat(document.getElementById("distanceInput").value);
  var info = document.getElementById("edgeInfoInput").value;

  if(isNaN(id_1) || isNaN(id_2)){
    alert("Error: ID titik tidak tepat.");
    return;
  }

  if(isNaN(value)){
    value = 0;
  }

  if(id_1 >= node_list.length || id_1 < 0 || id_2 >= node_list.length || id_2 < 0){
    alert("Error: Inputted node ID is not exist.");
    return;
  }

  // show in the google maps
  var node_1 = node_list[id_1];
  var node_2 = node_list[id_2];
  var path = new Array();
  path.push(new google.maps.LatLng(node_1.latitude, node_1.longitude));
  path.push(new google.maps.LatLng(node_2.latitude, node_2.longitude));
  var polyLineOptions = {
      path: path,
      strokeWeight: 2,
      strokeColor: "#000",
      strokeOpacity: "1",
	  icons: [{
            icon: lineSymbol,
            offset: '100%'
          }],

  };
  var polyLine = new google.maps.Polyline(polyLineOptions);
  polyLine.setMap(map);
  
  

  var newEdge = new Map_edge(node_1, node_2, value, info, polyLine);
  edge_list.push(newEdge);
  
   
  TambahJalur(node_1.index, node_2.index, value);

  // reset input field
  document.getElementById("node1Input").value = "";
  document.getElementById("node2Input").value = "";
  document.getElementById("distanceInput").value = "";
  document.getElementById("edgeInfoInput").value = ""; 
  SelectDisplay(); 

}

/* This function is called when a marker on the google maps is clicked. */
function SelectNode(index){
  SwitchSelectingNode(node_list[index]);
  if(selectingNode.info != ""){
    new google.maps.InfoWindow({
            content: selectingNode.info
    }).open(map, selectingNode.marker);
  }
  SelectDisplay();
}



/* This function is called when a marker on the google maps is dragend. */
function MoveNode(index, newLatLng){
  SwitchSelectingNode(node_list[index]);
  selectingNode.latitude = newLatLng.lat();
  selectingNode.longitude = newLatLng.lng();
  
  EditNode(index, newLatLng.lat(), newLatLng.lng());

  // move poly line
  for(var target_edge of edge_list){
    if(target_edge.node_1.index == index || target_edge.node_2.index == index){
      target_edge.polyLine.setMap(null);

      var node_1 = target_edge.node_1
      var node_2 = target_edge.node_2;
      var path = new Array();
      path.push(new google.maps.LatLng(node_1.latitude, node_1.longitude));
      path.push(new google.maps.LatLng(node_2.latitude, node_2.longitude));
      var polyLineOptions = {
          path: path,
          strokeWeight: 2,
			strokeColor: "#000",
			strokeOpacity: "1",
			icons: [{
				icon: lineSymbol,
				offset: '100%'
			  }],
      };
      var polyLine = new google.maps.Polyline(polyLineOptions);
      polyLine.setMap(map);
      target_edge.polyLine = polyLine;

      if(autoChangeDistance){
        var position_1 = new google.maps.LatLng(node_1.latitude, node_1.longitude);
        var position_2 = new google.maps.LatLng(node_2.latitude, node_2.longitude);
        var distance = google.maps.geometry.spherical.computeDistanceBetween(position_1, position_2);
        target_edge.value = distance;
      }
    }
	
	
  }

  // change evaluation
  if(autoChangeElevation){
    var latlng = new google.maps.LatLng(selectingNode.latitude, selectingNode.longitude);
    var request = {locations: new Array(latlng)};
    
    elevationObj.getElevationForLocations(request, function(response, status){
      if(status == google.maps.ElevationStatus.OK){
        selectingNode.value = response[0].elevation;
        SelectDisplay();
      }else{
        SelectDisplay();
        alert("Tidak dapat mengambil data elevation");
      }
    });
  }else{
    SelectDisplay();
  }
}

function SelectDisplay(){
  if(selectingNode == null){
    document.getElementById("select_id").textContent = "";
    document.getElementById("select_lat").value = "";
    document.getElementById("select_lng").value = "";
    document.getElementById("select_val").value = "";
    document.getElementById("select_info").value = "";

    document.getElementById("select_edges").innerHTML = "";
  }else{
    var index = selectingNode.index;
    document.getElementById("select_id").textContent = String(index);
    document.getElementById("select_lat").value = String(selectingNode.latitude);
    document.getElementById("select_lng").value = String(selectingNode.longitude);
    document.getElementById("select_val").value = String(selectingNode.value);
    document.getElementById("select_info").value = String(selectingNode.info);
    var edges_display = "";
    var edge_count = 0;

    for(var i = 0; i < edge_list.length; i++){
      var target_edge = edge_list[i];
      if(target_edge.node_1.index == index || target_edge.node_2.index == index){
        if(edge_count == 0){
          edge_count++;
        }else{
          // draw line to devide
          edges_display += '<div class="gray_line_thin"></div>'
        }

        edges_display += '<div class="select_panel_left">ID:</div><div class="select_panel_right">'+
        String(target_edge.node_1.index)+'-'+String(target_edge.node_2.index)+
        '</div><div class="select_panel_left">Jarak:</div><div class="select_panel_right"><input type="text" id="select_val_'+String(i)+'" class="select_panel_right" value="'+
        String(target_edge.value)+
        '"></div><div class="select_panel_left hide">Info:</div><div class="select_panel_both hide"><textarea id="select_info_'+String(i)+'" class="select_panel_both" value="">'+
        target_edge.info+
        '</textarea></div><div class="clearfix"></div><br/>'+
        '<button type="button" name="deleteEdgeBtn" class="btn btn-warning" onclick="UpdateEdge('+String(i)+')">Update Jalur</button>'+
        '<button type="button" name="deleteEdgeBtn" class="btn btn-danger" onclick="DeleteEdge('+String(i)+')">Hapus Jalur</button>'
      }
    }
    document.getElementById("select_edges").innerHTML = edges_display;
  }
}

/* Update now selecting node */
function UpdateNode(){
  if(selectingNode == null){
    return;
  }

  var lat = parseFloat(document.getElementById("select_lat").value);
  var lng = parseFloat(document.getElementById("select_lng").value);
  var value = parseFloat(document.getElementById("select_val").value);
  var info = String(document.getElementById("select_info").value);

  if(isNaN(lat) || isNaN(lng)){
    alert("Error: Latitude dan Longitude tidak tepat. ");
    SelectDisplay();
    return;
  }

  if(isNaN(value)){
    value = 0;
  }

  selectingNode.latitude = lat;
  selectingNode.longitude = lng;
  selectingNode.value = value;
  selectingNode.info = info;

   
  selectingNode.marker.setPosition(new google.maps.LatLng(lat, lng));

  // change icon
  if(info===""){
    selectingNode.marker.setIcon(selected_marker_icon);
  }else{
    selectingNode.marker.setIcon(selected_marker_icon_info);    
  }

  // move poly line
  var index = selectingNode.index;

  for(var target_edge of edge_list){
    if(target_edge.node_1.index == index || target_edge.node_2.index == index){
      target_edge.polyLine.setMap(null);

      var node_1 = target_edge.node_1
      var node_2 = target_edge.node_2;
      var path = new Array();
      path.push(new google.maps.LatLng(node_1.latitude, node_1.longitude));
      path.push(new google.maps.LatLng(node_2.latitude, node_2.longitude));
      var polyLineOptions = {
          path: path,
          strokeWeight: 2,
			strokeColor: "#000",
			strokeOpacity: "1",
			icons: [{
				icon: lineSymbol,
				offset: '100%'
			  }],
      };
      var polyLine = new google.maps.Polyline(polyLineOptions);
      polyLine.setMap(map);
      target_edge.polyLine = polyLine;

      if(autoChangeDistance){
        var position_1 = new google.maps.LatLng(node_1.latitude, node_1.longitude);
        var position_2 = new google.maps.LatLng(node_2.latitude, node_2.longitude);
        var distance = google.maps.geometry.spherical.computeDistanceBetween(position_1, position_2);
        target_edge.value = distance;
      }
    }
  }

  SelectDisplay();
  
  
}

function UpdateEdge(index){
  var value = parseFloat(document.getElementById("select_val_"+String(index)).value);
  var info = String(document.getElementById("select_info_"+String(index)).value);
  if(isNaN(value)){
    value = 0;
  }

  var targetEdge = edge_list[index];
  targetEdge.value = value;
  targetEdge.info = info;
  SelectDisplay();
}

/* delete now selecting node */
function DeleteNode(){
  var index = selectingNode.index;
  
  if(selectingNode == null){
    return;
  }

  if(window.confirm('Hapus titik terpilih, termasuk jalur yang menggunakannya? \nID: ' + String(index))){
    // delete edge using target node at first
    for(var i = edge_list.length - 1; i >= 0; i--){
      var target_edge = edge_list[i];
      if(target_edge.node_1.index == index || target_edge.node_2.index == index){
        target_edge.polyLine.setMap(null);
        edge_list.splice(i, 1);
      }
    }

    // then delete target node and update index
    selectingNode.marker.setMap(null);
	node_list.splice(index, 1);

    for(var i = index; i < node_list.length; i++){
      var selectIndex = i;
      node_list[i].index = selectIndex;
      google.maps.event.clearInstanceListeners(node_list[i].marker);
       
    }
	 
	 
	HapusNode(index);
	
    selectingNode = null;
    SelectDisplay();
  }
}

function DeleteEdge(index){
  var target_edge = edge_list[index];
  if(window.confirm('Hapus jalur terpilih?\nID: ' + String(target_edge.node_1.index) + '-' + String(target_edge.node_2.index) )){
    target_edge.polyLine.setMap(null);
    edge_list.splice(index, 1);
	
	HapusJalur(target_edge.node_1.index, target_edge.node_2.index);
	
    SelectDisplay();
  }
}




function TambahNode(index, lat, lng){ 
   
    var Lat = parseFloat(lat);
    var Lng = parseFloat(lng);
  
    var loc = new google.maps.LatLng(Lat, Lng);
     
	
    geocoder = new google.maps.Geocoder(); 
		
	if (geocoder) 
	{
		geocoder.geocode({'latLng': loc}, function(results, status) 
		{
			if (status == google.maps.GeocoderStatus.OK) 
			{
				if (results[0]) 
				{
					address = results[0].formatted_address;   
				}
			} 
			else 
			{
				alert("Geocoder failed due to: " + status);
			}
		});
	}
	
	 
	
	setTimeout(function(){
		
			var strID         = index;
			var strLat        = lat;
			var strLng        = lng;
			var strAlamat     = address;
			
			
			var fd = new FormData(); 
			fd.append('id',strID);
			fd.append('lat',strLat);
			fd.append('lng',strLng);
			fd.append('alamat',strAlamat); 
		
		
			$.ajax({
				url: '<?php echo base_url(); ?>nodedijkstra/tambah',
				type: 'post',
				data: fd,
				contentType: false,
				processData: false,
				success: function(response){
					if(response != 0){
						 
					}else{
						//alert('file not uploaded');
						 
					}
				},
			});
			
         
    },3000); //delay is in milliseconds 
   

 
		   
}
		
		
function TambahJalur(node_1, node_2, value){ 
    
	$.ajax({
				type : 'GET',
				url : '<?php echo base_url(); ?>nodedijkstra/tambahjalur/'+node_1+'/'+node_2+'/'+value,
				async: true,
				beforeSend: function(x) {
					if(x && x.overrideMimeType) {
						 x.overrideMimeType("application/j-son;charset=UTF-8");
					}
				},
				dataType : 'json',
				success : function(data){
						 
				},
					error: function(jqXHR, exception) {
					  						
				}
		}); 
		
		   
}

		
function EditNode(index, lat, lng){ 
   
	var Lat = parseFloat(lat);
    var Lng = parseFloat(lng);
  
    var loc = new google.maps.LatLng(Lat, Lng);
     
	
    geocoder = new google.maps.Geocoder(); 
		
	if (geocoder) 
	{
		geocoder.geocode({'latLng': loc}, function(results, status) 
		{
			if (status == google.maps.GeocoderStatus.OK) 
			{
				if (results[0]) 
				{
					address = results[0].formatted_address;   
				}
			} 
			else 
			{
				alert("Geocoder failed due to: " + status);
			}
		});
	}


	setTimeout(function(){
		
			var strID         = index;
			var strLat        = lat;
			var strLng        = lng;
			var strAlamat     = address;
			
			
			var fd = new FormData(); 
			fd.append('id',strID);
			fd.append('lat',strLat);
			fd.append('lng',strLng);
			fd.append('alamat',strAlamat); 
		
		
			$.ajax({
				url: '<?php echo base_url(); ?>nodedijkstra/update',
				type: 'post',
				data: fd,
				contentType: false,
				processData: false,
				success: function(response){
					if(response != 0){
						 
					}else{
						//alert('file not uploaded');
						 
					}
				},
			});
			
         
    },3000); //delay is in milliseconds 
   
	 
		   
}

		
function HapusNode(index){ 
   
	
	$.ajax({
		type : 'GET',
		url : '<?php echo base_url(); ?>nodedijkstra/hapus/'+index,
		async: true,
		beforeSend: function(x) {
			if(x && x.overrideMimeType) {
				 x.overrideMimeType("application/j-son;charset=UTF-8");
			}
		},
		dataType : 'json',
		success : function(data){
			
		},
			error: function(jqXHR, exception) {
			window.location = "<?php echo base_url(); ?>nodedijkstra";
		}
	});


		   
}


function HapusJalur(titik1, titik2){ 
   
	
	$.ajax({
		type : 'GET',
		url : '<?php echo base_url(); ?>nodedijkstra/hapusjalur/'+titik1+'/'+titik2,
		async: true,
		beforeSend: function(x) {
			if(x && x.overrideMimeType) {
				 x.overrideMimeType("application/j-son;charset=UTF-8");
			}
		},
		dataType : 'json',
		success : function(data){
			
		},
			error: function(jqXHR, exception) {
			window.location = "<?php echo base_url(); ?>nodedijkstra";
		}
	});


		   
}


 

function SimpanSemua(){
     
  for(var target_node of node_list){ 
	TambahNode(target_node.index, target_node.latitude, target_node.longitude); 
  }

  	
	
 
  for(var target_edge of edge_list){
    result += "\n" +
    String(target_edge.node_1.index) + "," +
    String(target_edge.node_2.index);

    if(includeEdgeValue){
      result += "," + String(target_edge.value);
    }
    if(includeEdgeInfo){
      result += "," + String(target_edge.info);
    }
  }
  
  

  
}




/* import selected file */
function siapkanData(){
   
    <?php
	$cari= $this->db->query("SELECT * FROM titik");
	$jumlahdata = $cari->num_rows();
	$data=$cari->result();
	//$data[0]['latitude'];
	?>
       
       
      var index_dif = node_list.length;

      // read node section
      
      <?php foreach ($data as $d) {?>   

        var lat = parseFloat(<?php echo $d->latitude; ?>);
        var lng = parseFloat(<?php echo $d->longitude; ?>);
        var value = 0;
        var info = "";

          var newMarker = new google.maps.Marker({  // set marker to the google maps
            position: new google.maps.LatLng(lat, lng),
            animation: google.maps.Animation.DROP,
            icon: {
				path: google.maps.SymbolPath.CIRCLE,
				scale: 4,
				fillColor: "#F00",
				fillOpacity: 1,
				strokeWeight: 1
			},
            draggable: true,
            map: map
          });
 
 
        var newNode = new Map_node(node_list.length, lat, lng, value, info, newMarker);
        node_list.push(newNode);

        with({index: newNode.index}){
          google.maps.event.addListener(newMarker, 'click', function(e) {
            SelectNode(index);
          });
          google.maps.event.addListener(newMarker, 'dragend', function(e) {
            MoveNode(index, e.latLng);
          });
		  
		  google.maps.event.addListener(newMarker, "dblclick", function (e) { 
			DeleteNode();
			});
					
		  
		  google.maps.event.addListener(newMarker,  'rightclick',  function(mouseEvent) { 
				 
				
				var id1 =  document.getElementById("node1Input").value;
				var id2 =  document.getElementById("node2Input").value;
		 
				
				if(id1=='' && id2=='') { 
					SetNode1();
					alert('node1siap');
				} else if(id1!='' && id2=='') { 
					SetNode2();  
					alert('node2siap');
					
				} else if(id1!='' && id2!='') {    
					document.getElementById("node1Input").value='';
					document.getElementById("node2Input").value='';
					SetNode1();
					alert('node1');
				}
			 
		  });
	  
        }
		
	 
	<?php } ?>



	<?php
	$cari= $this->db->query("SELECT * FROM jalur");
	$jumlahdata = $cari->num_rows();
	$data=$cari->result();
	//$data[0]['latitude'];
	?>
	
      // read edge section
      <?php 
		$i=0;
	  foreach ($data as $d) {?>  
        

        var id_1 = parseInt(<?php echo $d->titik_awal; ?>);
        var id_2 = parseInt(<?php echo $d->titik_akhir; ?>);
        var value = <?php echo $d->jarak; ?>;
        var info = "";

        
 

        // show in the google maps
        var node_1 = node_list[id_1];
        var node_2 = node_list[id_2];
        var path = new Array();
        path.push(new google.maps.LatLng(node_1.latitude, node_1.longitude));
        path.push(new google.maps.LatLng(node_2.latitude, node_2.longitude));
        var polyLineOptions = {
            path: path,
            strokeWeight: 2,
			strokeColor: "#000",
			strokeOpacity: "1",
			icons: [{
				icon: lineSymbol,
				offset: '100%'
			  }],
        };
        var polyLine = new google.maps.Polyline(polyLineOptions);
        polyLine.setMap(map);
		
		 
        var newEdge = new Map_edge(node_1, node_2, value, info, polyLine);
        edge_list.push(newEdge);
		
		google.maps.event.addListener(polyLine, 'dblclick', function() {
			DeleteEdge(<?php echo $i; ?>);
		});
		
		
		
      <?php 
		$i++;
	  } ?>

      SelectDisplay();

      
} 





	
	
	
	</script>

 
 