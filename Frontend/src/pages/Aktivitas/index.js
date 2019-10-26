import React, {Component} from 'react';
import {NavigatorBar} from '../../components/Navbar.js'
import SearchPage from '../../components/Search';
import CustomizedButtons from '../../components/Button'
 

class Aktivitas extends Component {
    render(){
        return(
            
            <div>
                <NavigatorBar/>
                <div className="container">
                    <SearchPage/>
                <p></p>
                <h2>Aktivitas</h2>
                <CustomizedButtons/>
                </div>
            </div>      
        )
    }
}

export default Aktivitas;