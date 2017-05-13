var Ship = function(type){
    this.type = type;
    this.readFile();
};

Ship.prototype.loadTiles = function(){
    var self = this;
    console.log('loadTiles');
    console.log(this.type);
    //this.getTiles();
    var shipMap = game.load.tilemap('map','assets/ships/ship-test.json',null,Phaser.Tilemap.TILED_JSON);
    console.log(shipMap);
    shipMap.onLoadComplete.addOnce(function(){
        // Créer la map
        self.create();
    });
};

Ship.prototype.readFile = function(){
    var self = this;
    Utils.readTextFile('assets/ships/ship-'+this.type+'.json', function(text){
        self.shipJson = JSON.parse(text);
        console.log(self.shipJson);
        self.getTiles();
    });
};

Ship.prototype.getTiles = function(){
    for( var i = 0; i < this.shipJson.tilesets.length; i++ ){
        game.load.image(this.shipJson.tilesets[i].name, 'assets/tiles/'+this.shipJson.tilesets[i].name+'.png');
    }
    // Lancer le chargement de la map
    this.loadTiles();

}

Ship.prototype.create = function(){
    var map = game.add.tilemap('map');
    console.log(map);
    for( var i = 0; i < this.shipJson.tilesets.length; i++ ){
        map.addTilesetImage(this.shipJson.tilesets[i].name);
    }
    for( var l = 0; l < this.shipJson.layers.length; l++ ){
        layer = map.createLayer(this.shipJson.layers[l].name);
    }
    layer.resizeWorld();
};