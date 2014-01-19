var app = app || {};

app.driver={}
app.driver.model = Backbone.Model.extend({
    url: "/index.php/service/driver.json",
    initialize:function(){

        this.on('editme',formview.fill);
    },
    validate:function(attrs,option){

    },
    submit:function(data){
        var _this=this;
        this.save(data,{wait:true,success:function(){
            if(_this.serverError) delete _this.serverError;
        },error:function(model,response,options){
            console.log(response);
            errors=jQuery.parseJSON(response.responseText);
            _this.serverError=errors;
           _this.trigger("servererror");
        }})



    }
});
app.driver.collection=Backbone.Collection.extend({
    model:app.driver.model,
    url: "/index.php/service/drivers.json"
})
app.driver.grid={};
var editCell=Backgrid.Cell.extend({
    template: _.template('<button>Edit</button>'),
    events: {
        "click": "editRow"
    },
    editRow: function (e) {
        console.log("Hello");
        e.preventDefault();
        this.model.trigger('editme',this.model);
    },
    render: function () {
        this.$el.html(this.template());
        this.delegateEvents();
        return this;
    }
});
var Boolean2Cell = Backgrid.Cell.extend({

    /** @property */
    className: "boolean-cell",

    /** @property */
    editor: Backgrid.BooleanCellEditor,

    /** @property */
    events: {
        "click": "enterEditMode"
    },

    /**
     Renders a checkbox and check it if the model value of this column is true,
     uncheck otherwise.
     */
    render: function () {
        this.$el.empty();
        this.$el.append($("<input>", {
            tabIndex: -1,
            type: "checkbox",
            checked: (this.formatter.fromRaw(this.model.get(this.column.get("name")))==0)?false:true
        }));
        this.delegateEvents();
        return this;
    }

});
app.driver.grid.columns = [{
    name: "id", // The key of the model attribute
    label: "ID", // The name to display in the header
    editable: false, // By default every cell in a column is editable, but *ID* shouldn't be
    // Defines a cell type, and ID is displayed as an integer without the ',' separating 1000s.
    cell:"string"
}, {
    name: "fullname",
    label: "نام و نام خانوادگی",
    // The cell type can be a reference of a Backgrid.Cell subclass, any Backgrid.Cell subclass instances like *id* above, or a string
    cell: "string" // This is converted to "StringCell" and a corresponding class in the Backgrid package namespace is looked up
}, {
    name: "phonenumber",
    label: "شماره تلفن",
    cell: "string" // An integer cell is a number cell that displays humanized integers
},{
    name: "vehicleID",
    label: "شماره خودرو",
    cell: "string" // An integer cell is a number cell that displays humanized integers
},{
    name: "outofservice",
    label: "وضعیت مرخصی",
    cell: Boolean2Cell // An integer cell is a number cell that displays humanized integers
},{
    name: "description",
    label: "توضیحات",
    cell: "string" // An integer cell is a number cell that displays humanized integers
},
    {
        name:"edit",
        label:"ویرایش",
        cell:editCell
    }];
app.driver.list= Backbone.View.extend({
    el:$('#drivergrid'),
    initialize:function(){
        this.model=new app.driver.collection;
        this.grid = new Backgrid.Grid({
            columns:app.driver.grid.columns,
            collection: this.model
        });

        app.driver.list.collection=this.model;
        this.model.on('sync',this.render,this);
        this.model.fetch();
    },
    render:function(){
            console.log('List Render');


        this.$el.html(this.grid.render().el);

    }
})
app.driver.form = Backbone.View.extend({
    el:$('#driverform'),
    initialize:function(){

        _.bindAll(this);
        console.log("form init");
//        AutoCoplete Init
        $('#vehicleID').typeahead({
            name: 'vehicleID',
            remote: '/index.php/service/vehiclesList.json?q=%QUERY'
        });
        $('#vehicleID').on("typeahead:selected",this.vehicleSelect);
        $('#btnnewform').on("click",this.newform);

    },
    events:{
        "click button":"formsubmit",
        "click #cancel":"formCancel"
    },
    fill:function(model){

        if(this.previeusModel && this.previeusModel.isNew())this.previeusModel.destroy();
        this.model=model;
        this.model.on('sync',this.enableVehicle);
        this.model.on("servererror",this.showerror);
        this.$el.find('input[name=fullname]').val(this.model.get('fullname')||"");
        this.$el.find('input[name=phonenumber]').val(this.model.get('phonenumber')||"");
        if(this.model.isNew()){
            this.$el.find('input[name=vehicleBox]').attr('disabled','disabled');
        }else{
            this.$el.find('input[name=vehicleBox]').prop('disabled',false);
            this.$el.find('input[name=vehicleID]').val(this.model.get('vehicleID')||"");
        }


        this.$el.find('textarea[name=description]').val(this.model.get('description')||"");
        this.$el.find('input[name=outofservice]').prop("checked",(this.model.get('outofservice')==1)?true:false);
        this.previeusModel=this.model
    },
    newform:function(e){
        e.preventDefault();
        this.model=new app.driver.model();
        app.driver.list.collection.add(this.model);
        this.fill(this.model);


    },
    formsubmit:function(e){

        e.preventDefault();

        data={
            fullname:$('#driverform input[name=fullname]').val(),
            phonenumber:$('#driverform input[name=phonenumber]').val(),
            description:$('#driverform textarea[name=description]').val(),
            vehicleID:$('#driverform input[name=vehicleID]').val(),
            outofservice:$('#driverform input[name=outofservice]').is(':checked')?"1":"0"
        };

        this.model.submit(data);

    },
    enableVehicle:function(){
      if(_.isNumber(this.model.get('id'))){
          this.$el.find('input[name=vehicleBox]').prop('disabled',false);
      }
    },
    showerror:function(){
        $('#error').empty();
        _.each(this.model.serverError,function(error){
           $('#error').append(error['error']);
        });
    },
    formCancel:function(e){
        e.preventDefault();
        this.model.destroy();
    },
    vehicleSelect:function(e,data){

      $('input[name=vehicleID]').val(data.ID);
    }


})
var formview
$(document).ready(function(){
formview  =  new app.driver.form();
driverlist= new app.driver.list();


})

;
