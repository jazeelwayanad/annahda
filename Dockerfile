...
# Startup script
COPY start.sh /start.sh
RUN chmod +x /start.sh

EXPOSE 8000
CMD ["sh", "/start.sh"]
