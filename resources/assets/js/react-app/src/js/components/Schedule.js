import React, { Component } from 'react';
import DatePicker from 'react-datepicker';
import ptBr from 'date-fns/locale/pt';
import Select from 'react-select';
import axios from 'axios';

import "react-datepicker/dist/react-datepicker.css";
import './schedule.scss';

const options = [
    { value: 'chocolate', label: 'Chocolate' },
    { value: 'strawberry', label: 'Strawberry' },
    { value: 'vanilla', label: 'Vanilla' }
];

export default class Schedule extends Component {

    state = {
        startDate: null,
        selectedOption: null,
        package: '',
        transfer: [],

    }

    async componentDidMount() {
        const endpoint = window.location.pathname;
        const transfer = await axios.get(`/api${endpoint}`);
        console.log(transfer.data.data);
        const date = new Date();
        this.setState({startDate: date.now, transfer: [...transfer.data]})
        console.log(this.state);
    }


    handleChange = (e) => {
        console.log(e.target);
    }

    handleChangeSelect = (selectedOption) => {
        this.setState({ selectedOption });
        console.log(`Option selected:`, selectedOption);
    }

    render() {
        const { selectedOption } = this.state;
        return (
            <div className="schedule">
                <div className="schedule__box">
                    <div className="schedule__header">
                        <div className="schedule__title">
                            <i className="fi fi-bus"></i>
                            <span>Agendar Transfer</span>
                        </div>
                        <div className="schedule__field">
                            <label className="schedule__label">
                                Translado de
                            </label>
                            <input type="text" name="departure" className="schedule__input" onChange={this.handleChange} placeholder="Digite a origem" />
                        </div>
                        <div className="schedule__field">
                            <label className="schedule__label">
                                Para
                            </label>
                            <input type="text" name="destination" className="schedule__input" onChange={this.handleChange} placeholder="Digite o destino" />
                        </div>
                        <div className="schedule__choiche">
                            <div className="schedule__radio">
                                <input type="radio" id="ida-e-volta" name="package" onChange={this.handleChange}/>
                                <label className="schedule__label" for="ida-e-volta">
                                    <span className="schedule__label-bullet"></span>
                                    ida e volta
                                </label>
                                
                            </div>
                            <div className="schedule__radio">
                                <input type="radio" id="ida-ou-volta" onChange={this.handleChange} name="package"/>
                                <label className="schedule__label" for="ida-ou-volta" >
                                    <span className="schedule__label-bullet"></span>
                                ida ou volta
                                </label>
                            </div>
                        </div>
                        
                    </div>
                    <div className="schedule__date">
                        <div className="schedule__field">
                            <label className="schedule__label">
                                <i className="fi fi-calendar"></i> Ida
                            </label>
                            <DatePicker
                                selected={this.state.startDate}
                                onChange={this.handleChange}
                            />
                        </div>
                        <div className="schedule__field">
                            <label className="schedule__label">
                                <i className="fi fi-calendar"></i> Volta
                            </label>
                            <DatePicker
                                selected={this.state.startDate}
                                onChange={this.handleChange}
                            />
                        </div>
                        <div className="schedule__field">
                            <label className="schedule__label">
                                <i className="fi fi-clock"></i> Hora
                            </label>
                            <select name="hour"></select>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
