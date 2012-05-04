var labelType, useGradients, nativeTextSupport, animate;
function myinit(curr, treeid){
  var json = curr;
  document.getElementById('infovis').innerHTML = "";
  init(json, treeid);
};

function init(tmp, treeid){    
    var json = tmp;
    //A client-side tree generator
    var getTree = (function() {
        var i = 0;
        return function(nodeId, level) {
          var subtree = eval('(' + json.replace(/id:\"([a-zA-Z0-9]+)\"/g, 
          function(all, match) {
            return "id:\"" + match + "_" + i + "\""  
          }) + ')');
          $jit.json.prune(subtree, level); i++;
          return {
              'id': nodeId,
              'children': subtree.children
          };
        };
    })();
    
    //Implement a node rendering function called 'nodeline' that plots a straight line
    //when contracting or expanding a subtree.
    $jit.ST.Plot.NodeTypes.implement({
        'nodeline': {
          'render': function(node, canvas, animating) {
                if(animating === 'expand' || animating === 'contract') {
                  var pos = node.pos.getc(true), nconfig = this.node, data = node.data;
                  var width  = nconfig.width, height = nconfig.height;
                  var algnPos = this.getAlignedPos(pos, width, height);
                  var ctx = canvas.getCtx(), ort = this.config.orientation;
                  ctx.beginPath();
                  if(ort == 'left' || ort == 'right') {
                      ctx.moveTo(algnPos.x, algnPos.y + height / 2);
                      ctx.lineTo(algnPos.x + width, algnPos.y + height / 2);
                  } else {
                      ctx.moveTo(algnPos.x + width / 2, algnPos.y);
                      ctx.lineTo(algnPos.x + width / 2, algnPos.y + height);
                  }
                  ctx.stroke();
              } 
          }
        }
          
    });

    //init Spacetree
    //Create a new ST instance
    var st = new $jit.ST({
        injectInto: 'infovis',
        //set duration for the animation
        duration: 620,
        //set animation transition type
        transition: $jit.Trans.Quart.easeInOut,
        //set distance between node and its children
        levelDistance: 100,
        //set max levels to show. Useful when used with
        //the request method for requesting trees of specific depth
        levelsToShow: 1,
        orientation:"top",
        //set node and edge styles
        //set overridable=true for styling individual
        //nodes or edges
        Node: {
            height: 30,
            width: 80,
            type: "circle",
            dim:30,
            color:'#23A4FF',
            //lineWidth: 3,
            align:"center",
            overridable: true
        },
        
        Edge: {
            type: 'bezier',
            lineWidth: 3,
            color:'#23A4FF',
            overridable: true
        },
        
        //This method is called on DOM label creation.
        //Use this method to add event handlers and styles to
        //your node.
        onCreateLabel: function(label, node){
            label.id = node.id;            
            label.innerHTML = node.name;
            label.onclick = function(){
                st.onClick(node.id, {onComplete:function(){
                  
                  var $dialog = $('<div><p>Author: ' + node.data.$author + '<br />' + node.data.$content +'</p></div>');
                  $dialog.dialog({
                    title: node.name,
                    minwidth: 100,
                    minheight: 100,
                    draggable:true,
                    closeText:"x",
                    //modal:true,
                    resizable:true,
                    buttons:{ "Create Branch": function() { 
                                $(this).html('<div><p>Author: ' + node.data.$author + '<br />' + node.data.$content +' <br /><br />New Branch<br /><form action="createnode.php" method="post">Title: <input type="text" name="Title" /><br />Author: <input type="text" name="Author" /><br />Story: <input type="text" name="Story" /><br /><input type="submit" name="Submit" /><input type="hidden" name="tree_id" value="' + treeid + '"><input type="hidden" name="node_id" value="' + node.id + '"></form></p></div>');
                                $(this).dialog({
                                  buttons:{ /*"Submit": function() {
                                      //insert form data into database
                                      $(this).dialog("close");
                                    }*/
                                  }
                                });
                              } 
                            }
                  });
                  $dialog.dialog('open');
                }});
            };
            //set label styles
            var style = label.style;
            style.width = 80 + 'px';
            style.height = 30 + 'px';            
            style.cursor = 'pointer';
            style.color = '#fff';
            //style.backgroundColor = '#1a1a1a';
            style.fontSize = '1.0em';
            style.textAlign= 'center';
            style.textDecoration = 'none';
            style.paddingTop = '0px';
        },
        
        //This method is called right before plotting
        //a node. It's useful for changing an individual node
        //style properties before plotting it.
        //The data properties prefixed with a dollar
        //sign will override the global node style properties.
        onBeforePlotNode: function(node){
            //add some color to the nodes in the path between the
            //root node and the selected node.
            
          color = node.getData('color');
          node.setData('color', color);
        },
        
        //This method is called right before plotting
        //an edge. It's useful for changing an individual edge
        //style properties before plotting it.
        //Edge data proprties prefixed with a dollar sign will
        //override the Edge global style properties.
        onBeforePlotLine: function(adj){
            if (adj.nodeFrom.selected && adj.nodeTo.selected) {
                adj.data.$color = "#eed";
                adj.data.$lineWidth = 3;
            }
            else {
                delete adj.data.$color;
                delete adj.data.$lineWidth;
            }
        }
    });
    //load json data
    st.loadJSON(eval( '(' + json + ')' ));
    //compute node positions and layout
    st.compute();
    
    //emulate a click on the root node.
    st.onClick(st.root);
    //end
}
