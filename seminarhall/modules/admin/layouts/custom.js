/*
 * 	Submit a Report about a meeting
 */
 
var submitmeet = new Ext.FormPanel({
 // since we are not using the default 'panel' xtype, we must specify it
	id: 'submit-panel',
    labelWidth: 200,
    title: 'Sumit Report about Meeting',
    bodyStyle: 'padding:15px',
    width: 350,
	labelPad: 20,
	url:'postdata.php', 
	layoutConfig: {
		labelSeparator: ''
	},
    defaults: {
		width: 300,
		msgTarget: 'side'
	},
    items: [{
			xtype:'textfield',
            fieldLabel: 'Day',
            name: 'day',
            allowBlank:false,
			width: 50,
			maskRe: /[0-9]/
        },{
			xtype:'textfield',
            fieldLabel: 'Month',
            name: 'month',
            allowBlank:false,
			width: 50,
			vtype: 'alpha'
        },{
			xtype:'textfield',
            fieldLabel: 'Year',
            name: 'year',
            allowBlank:false,
			width: 50,
			maskRe: /[0-9]/
        },{
			xtype:'textfield',
            fieldLabel: 'Hour',
            name: 'hr',
            allowBlank:false,
			width: 50,
			maskRe: /[0-9]/
        },{
            fieldLabel: 'How many people attend the meet?',
			xtype:'textfield',
            name: 'ppl',
			allowBlank: false,
			maskRe: /[0-9]/
        },{
            fieldLabel: 'Was the meet successful?',
            name: 'success',
			xtype: 'radio',
			boxLabel: 'Yes'
        },{
			xtype: 'radio',
			hideLabel: false,
			labelSeparator: '',
			name: 'success',
			boxLabel: 'No'
		},{
			xtype: 'radio',
			hideLabel: false,
			labelSeparator: '',
			name: 'success',
			boxLabel: 'May Be'
		},
		{
            fieldLabel: 'The meet was conducted by?',
            name: 'conducted',
            xtype: 'textfield'
        },{
			fieldLabel: 'His contact mail id?',
			name: 'contact',
			xtype: 'textfield',
			vtype: 'email'
		},{
			fieldLabel: 'Popularity Quotient %',
			name: 'popularity',
			xtype: 'textfield',
			maskRe: /[0-9]/
		},{
			fieldLabel: 'Comments(if any)',
			name: 'comments',
			xtype: 'htmleditor',
			hideLabel: true,
			labelSeparator: '',
			height: 250,
			anchor: '70%'
		}
    ],
    buttons: [{
			  text: 'Save',
                formBind: true,	 
                // Function that fires when user clicks the button 
                handler:function(){ 
                    submitmeet.getForm().submit({ 
                        method:'POST', 
                        waitTitle:'Connecting', 
                        waitMsg:'Sending data...',
						success:function(){ 
                        	Ext.Msg.alert('Status', 'Data entry successful!', function(btn, text){
				   			if (btn == 'ok')
									{
										submitmeet.getForm().reset();
		                           }
			        		});
                        },
						failure:function(form, action){ 
                            
                            Ext.Msg.alert("Failure","Unable to reache server :("); 
                             
                            submitmeet.getForm().reset(); 
                        	} 
						})
					}
			  },{text: 'Cancel'}]
});
/*
 * 	Analyse about a teacher
 */
var teacherList = {
	id: 'view-panel',
	bodyStyle: 'padding:5px',
	layout: 'border',
	border: false,
    items: []
};