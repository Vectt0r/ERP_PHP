# Use a imagem base do Ubuntu
FROM ubuntu:latest

# Atualize o sistema e instale o Apache
RUN apt-get update && apt-get install -y apache2

# Exponha a porta 80
EXPOSE 80

# Inicialize o Apache quando o contêiner for iniciado
CMD ["apache2ctl", "-D", "FOREGROUND"]
