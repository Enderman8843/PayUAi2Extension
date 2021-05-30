
package io.sashi.payu;

import android.app.Activity;
import android.content.Context;
import com.google.appinventor.components.annotations.*;
import com.google.appinventor.components.common.ComponentCategory;
import com.google.appinventor.components.runtime.AndroidNonvisibleComponent;
import com.google.appinventor.components.runtime.ComponentContainer;
import com.google.appinventor.components.runtime.EventDispatcher;

@DesignerComponent(
        version = 1,
        description = "PayU Payment extension by sashibhusan_coder",
        category = ComponentCategory.EXTENSION,
        nonVisible = true,
        iconName = "https://i.ibb.co/CzDQQzf/download.png")

@SimpleObject(external = true)
//Libraries
@UsesLibraries(libraries = "")
//Permissions
@UsesPermissions(permissionNames = "")

public class PayU extends AndroidNonvisibleComponent {

    //Activity and Context
    private Context context;
    private Activity activity;

    public PayU(ComponentContainer container){
        super(container.$form());
        this.activity = container.$context();
        this.context = container.$context();
    }

 @SimpleFunction(description = "Creates Payment")
public void IntiatePayment(String domainUrl ,String merchantKey ,String salt ,int phoneNo ,String firstName ,String lastName ,String email ,int amount) {
       URLGenerated( domainUrl + "?" + "mkey" + "=" + merchantKey + "&" + "salt" + "=" + salt +"&" + "mobile_no" + "=" +  phoneNo + "&" + "first_name" + "=" + firstName + "&" + "last_Name" + "=" + 
       lastName + "&" + "email" + "=" + email + "&" + "amount" + "=" + amount);
    }
  
    @SimpleEvent(description = "Generated URL")
    public void URLGenerated(String URL) {
      EventDispatcher.dispatchEvent(this, "URLGenerated", URL);
    }

   @SimpleFunction(description = "Multivendor Url")
    public String MultiVendor() { 
    return "http://sashibhusan.atwebpages.com/PayUForm/payu.php";
    }
}
