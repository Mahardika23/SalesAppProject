import React, { Component } from 'react';
import {BrowserRouter as Router, Route, Switch} from 'react-router-dom';
import './App.css';
import Beranda from './pages/Beranda.jsx';
import Aktivitas from './pages/Aktivitas/index';
import {Layout} from './components/Layout';
import {Login} from './pages/Login.jsx';
import Daftar from './pages/Daftar/index';
import Produk from './pages/Produk/index';
import Pesan from './pages/Pesan/index';
import Daftar2 from './pages/Daftar2/index';
import Distributor from './pages/Distri/Distri'


class App extends Component {
  render() {
    return (
      <Router>
        <div>
          <Route exact path="/" component={Beranda}></Route>
          <Route exact path="/login" component={Login}></Route>
          <Route exact path="/aktivitas" component={Aktivitas}></Route>
          <Route exact path="/daftar" component={Daftar}></Route>
          <Route exact path="/daftar2" component={Daftar2}></Route>
          <Route exact path="/produk" component={Produk}></Route>
          <Route exact path="/pesan" component={Pesan}></Route>
          <Route exact path="/distributor" component={Distributor}></Route>
        </div>
      </Router>
    );
  }
}
export default App;