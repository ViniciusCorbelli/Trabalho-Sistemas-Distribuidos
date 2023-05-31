package com.ufjf;

import org.apache.cxf.jaxws.JaxWsServerFactoryBean;

public class App {
    public static void main(String[] args) {
        String address = "http://localhost:8081/temperature-converter";

        TemperatureConverterImpl implementor = new TemperatureConverterImpl();
        JaxWsServerFactoryBean factory = new JaxWsServerFactoryBean();
        factory.setServiceClass(TemperatureConverter.class);
        factory.setAddress(address);
        factory.setServiceBean(implementor);
        factory.create();

        System.out.println("Serviço inicializado em: " + address);
    }
}
