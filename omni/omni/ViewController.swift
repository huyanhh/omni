//
//  ViewController.swift
//  omni
//
//  Created by Huyanh Hoang on 2017. 1. 22..
//  Copyright © 2017년 TeamPennApps. All rights reserved.
//

import UIKit

class ViewController: UIViewController {
    
    
    func postFunction() {
        var url: NSURL = NSURL(string: "http://localhost:8888")!
        var request: NSMutableURLRequest = NSMutableURLRequest(url: url as URL)
        var bodyData = "submit=something"
        
        request.httpMethod = "POST"
        
        request.httpBody = bodyData.data(using: String.Encoding.utf8);
        NSURLConnection.sendAsynchronousRequest(request as URLRequest, queue: OperationQueue.main)
        {
            (response, data, error) in
                print(response)
            
        }
        
    }

    @IBAction func postRequest() {
        postFunction()
    }
    
    override func viewDidLoad() {
        super.viewDidLoad()
        // Do any additional setup after loading the view, typically from a nib.
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }


}

