// External Dependencies
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

// Internal Dependencies
import './style.css';


class WidgetModule extends Component {

    static slug = 'diviwmext_diviwm_module';



    render() {


        return (
            <div  dangerouslySetInnerHTML={{ __html: this.props.__widget}} />

        );
    }


}

export default WidgetModule;