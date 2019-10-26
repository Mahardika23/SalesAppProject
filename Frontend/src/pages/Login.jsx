import React, {Component} from 'react';
import LoginF from '../containers/Login';
import "./Login.css"

export class Login extends Component {
    render(){
        return(
            <div className="login">
                <LoginF/>
            </div>      
        )
    }
}
