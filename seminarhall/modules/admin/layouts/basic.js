	//Model Record
	
	var ds_model = Ext.data.Record.create([
	'facultyid',
	'fname',
	'rank',
	'mailid',
	'username',
	'password'
]);
	
	///--
	
	/// The Stores :)
	
	var ranks = new Ext.data.SimpleStore({
	        fields: ['id', 'rank'],
	        data : [['0','Professor'],['1','Asst. Professor'],['2','Lecturer'],['3','Staff']]
	    });
	
	function rank_name(val){
			return ranks.queryBy(function(rec){
				return rec.data.id == val;
			}).itemAt(0).data.rank;
		}
	
	//-- Rank Editor
	
	var rank_edit = new Ext.form.ComboBox({
			typeAhead: true,
			triggerAction: 'all',
			mode: 'local',
			store: ranks,
			displayField:'rank',
			valueField: 'id'
		});
	
	//
	
	store = new Ext.data.Store({
      id: 'PresidentsDataStore',
      proxy: new Ext.data.HttpProxy({
                url: 'pulldata.php', 
                method: 'POST'
            }),
            baseParams:{task: "LISTING"}, // this parameter is passed for any HTTP request
      reader: new Ext.data.JsonReader({
        root: 'results',
        totalProperty: 'total',
        id: 'id'
      },[
		 {name: 'facultyid', type: 'string', mapping: 'facultyid'},
		 {name: 'fname', type: 'string', mapping: 'fname'},
		 {name: 'rank', type: 'string', mapping: 'rank'},
		 {name: 'mailid', type: 'string', mapping: 'mailid'},
        {name: 'username', type: 'string', mapping: 'username'},
        {name: 'password', type: 'string', mapping: 'password'}
      ]),
      sortInfo:{field: 'facultyid', direction: "ASC"}
    });
    
  	mod = new Ext.grid.ColumnModel(
    [{
		 header: 'Faculty ID',
		dataIndex: 'facultyid',
		readOnly: true,
		width: 70,
		hidden: false
	  },{
        header: 'Faculty Name',
        dataIndex: 'fname',
        width: 200,
        hidden: false,
		editor: new Ext.form.TextField({
            allowBlank: false,
            maxLength: 40
            //maskRe: /([a-zA-Z0-9\s]+)$/
          })
      },{
        header: 'Rank',
        dataIndex: 'rank',
        width: 100,
		renderer: rank_name,
        editor: rank_edit
      },{
        header: 'Mail ID',
        dataIndex: 'mailid',
        width: 300,
        editor: new Ext.form.TextField({
            allowBlank: false,
            maxLength: 40
            //maskRe: /([a-zA-Z0-9\s]+)$/
          })
      },{
        header: 'Username',
        dataIndex: 'username',
        width: 100,
        editor: new Ext.form.TextField({
            allowBlank: false,
            maxLength: 20,
            maskRe: /([a-zA-Z0-9\s]+)$/
          })
      },{
        header: 'Password',
        dataIndex: 'password',
        width: 100,
        editor: new Ext.form.TextField({
            allowBlank: false,
            maxLength: 20,
            maskRe: /([a-zA-Z0-9\s]+)$/
          })
      }]
    );
    mod.defaultSortable= true;
	
	facultygrids =  new Ext.grid.EditorGridPanel({
      id: 'add-faculty-panel',
	  xtype: 'grid',
	  layout: 'fit',
	  stripeRows: true,
      store: store,
      cm: mod,
      enableColLock:false,
      clicksToEdit:1,
      selModel: new Ext.grid.RowSelectionModel({singleSelect:false}),
	  keys: [
				{
					key: 46,
					fn: function(key,e){
						var sm = facultygrids.getSelectionModel();
						var sel = sm.getSelected();
						if (sm.hasSelection()){
							Ext.Msg.show({
								title: 'Remove Faculty', 
								buttons: Ext.MessageBox.YESNOCANCEL,
								msg: 'Remove '+sel.data.fname+'?',
								fn: function(btn){
									if (btn == 'yes'){
										 Ext.Ajax.request({
													 url: 'updateRows.php',
													 params: {
														 task: "DELFAC",
														 facultyid: sel.data.facultyid
													 },
													 success: function(response){
														  var result=eval(response.responseText);
														  switch(result){
														  case 1:  // Success : simply reload
															store.reload();
															break;
														  default:
															Ext.MessageBox.alert('Warning','Could not delete the entire selection.');
															break;
														  }
														},
														failure: function(response){
														  var result=response.responseText;
														  Ext.MessageBox.alert('error','could not connect to the database. retry later');      
														  }

													 });
									}
								}
							});
						}
					},
					ctrl:false,
					stopEvent:true
				}
			],
			tbar: [{
				text: 'Add Faculty',
				icon: '../../images/table_add.png',
				cls: 'x-btn-text-icon',
				handler: function(ev) {
										
					Ext.Ajax.request({
						 url: 'updateRows.php',
						 params: {
							 task: "ADDFAC"
						 },
						 success: function(response){
							  var insert_id = Ext.util.JSON.decode(response.responseText).insert_id;
							  facultygrids.getStore().insert(facultygrids.getStore().getCount(), new ds_model({facultyid:insert_id,fname:'',rank:0,mailid:'',username:'',password:''}));
					facultygrids.startEditing(facultygrids.getStore().getCount()-1,1);

							},
							failure: function(response){
							  var result=response.responseText;
							  Ext.MessageBox.alert('error','could not connect to the database. retry later');      
							  }

						 });
				}
			},{
				text: 'Remove Faculty',
				icon: '../../images/table_delete.png',
				cls: 'x-btn-text-icon',
				handler: function() {
					var sm = facultygrids.getSelectionModel();
					var sel = sm.getSelected();
					if (sm.hasSelection()){
						Ext.Msg.show({
							title: 'Remove Faculty', 
							buttons: Ext.MessageBox.YESNOCANCEL,
							msg: 'Remove '+sel.data.fname+'?',
							fn: function(btn){
								if (btn == 'yes'){
									
									Ext.Ajax.request({
													 url: 'updateRows.php',
													 params: {
														 task: "DELFAC",
														 facultyid: sel.data.facultyid
													 },
													 success: function(response){
														  var result=eval(response.responseText);
														  switch(result){
														  case 1:  // Success : simply reload
															store.reload();
															break;
														  default:
															Ext.MessageBox.alert('Warning','Could not delete the entire selection.');
															break;
														  }
														},
														failure: function(response){
														  var result=response.responseText;
														  Ext.MessageBox.alert('error','could not connect to the database. retry later');      
														  }

													 });
									
									
								}
							}
						});
					}
				}
			}]
    });

	store.load();
	
	/// Stores end here	
	
	//save
	
   function saveTheFaculty(oGrid_event){
   Ext.Ajax.request({   
      waitMsg: 'Please wait...',
      url: 'pulldata.php',
      params: {
         task: "UPDATEFAC",
		 facultyid: oGrid_event.record.data.facultyid,
		 fname: oGrid_event.record.data.fname,
		 rank: oGrid_event.record.data.rank,
		 mailid: oGrid_event.record.data.mailid,
         username: oGrid_event.record.data.username,
         password: oGrid_event.record.data.password
      }, 
      success: function(response){							
         var result=eval(response.responseText);
         switch(result){
         case 1:
            store.commitChanges();   // changes successful, get rid of the red triangles
            //store.reload();
			//oGrid_event.startEditing(oGrid_event.field);
			// reload our datastore.
            break;					
         default:
            Ext.MessageBox.alert('Uh uh...','We couldn\'t save him...');
            break;
         }
      },
      failure: function(response){
         var result=response.responseText;
         Ext.MessageBox.alert('error','could not connect to the database. retry later');		
      }									    
   });   
  }
	facultygrids.on('afteredit', saveTheFaculty);
	///


// The default start page, also a simple example of a FitLayout.
var start = {
	id: 'start-panel',
	title: 'Start Page',
	layout: 'fit',
	bodyStyle: 'padding:25px',
	contentEl: 'start-div'  // pull existing content from the page
};

/*
 * Faculty Grid
 */
var addfaculty = facultygrids;

/*
 * Staff Grid
 */
var addstaff = {
    id: 'add-staffs-panel',
	title: 'Accordion Layout',
    layout: 'accordion',
    bodyBorder: false,  // useful for accordion containers since the inner panels have borders already
    bodyStyle: 'background-color:#DFE8F6',  // if all accordion panels are collapsed, this looks better in this layout
	defaults: {bodyStyle: 'padding:15px'},
    items: [{
        title: 'Introduction',
		tools: [{id:'gear'},{id:'refresh'}],
		html: '<p>Here is some accordion content.  Click on one of the other bars below for more.</p>'
    },{
        title: 'Basic Content',
		html: '<br /><p>More content.  Open the third panel for a customized look and feel example.</p>',
		items: {
			xtype: 'button',
			text: 'Show Next Panel',
			handler: function(){
				Ext.getCmp('acc-custom').expand(true);
			}
		}
    },{
		id: 'acc-custom',
        title: 'Custom Panel Look and Feel',
		cls: 'custom-accordion', // look in layout-browser.css to see the CSS rules for this class
		html: '<p>Here is an example of how easy it is to completely customize the look and feel of an individual panel simply by adding a CSS class in the config.</p>'
    }]
};