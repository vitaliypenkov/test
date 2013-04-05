/***********************************************************************
 * scripts.js
 *
 * Computer Science 50
 * Problem Set 7
 *
 * Global JavaScript, if any.
 **********************************************************************/
function informAboutChanges() 
    {
       var info = ('.info');
       var error = ('.error');
       var save = ('#save');
       var changes_div = ('<div id ="changes"></div>');
       var changes_made = ('#changes');
       var msg = ('<br>Changes have been made to the page. Please make sure you save data before leaving the page');
       if ($(info).length > 0)
       {
            $(info).remove();
       }
       
       if ($(error).length > 0)
       {
            $(error).remove();
       } 
      
       if ($(changes_made).length <= 0)
       {
            $(save).after(changes_div);
            $(changes_made).append(msg);
       }   
    }
